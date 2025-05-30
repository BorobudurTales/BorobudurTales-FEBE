<?php

namespace Database\Seeders;

use App\Models\Cerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $ceritas = Cerita::orderBy('id')->get();

        if ($ceritas->isEmpty()) {
            $this->command->warn('Tidak ada data di tabel "ceritas". Seeder datasets dilewati.');
            return;
        }

        $folder = public_path('img/data');
        $files = array_values(array_diff(scandir($folder), ['.', '..']));

        if (empty($files)) {
            $this->command->warn('Tidak ada file ditemukan di /public/img/data.');
            return;
        }

        $count = min($ceritas->count(), count($files));

        for ($i = 0; $i < $count; $i++) {
            $filename = basename($files[$i]);
            $cerita = $ceritas[$i];

            // pakai Eloquent relasi untuk insert data dan otomatis isi cerita_id
            $cerita->images()->create([
                'filename' => $filename,
            ]);
        }

        $this->command->info("$count file dimasukkan ke tabel images dengan relasi Eloquent berurutan.");
    }
}
