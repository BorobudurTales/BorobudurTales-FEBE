<?php

namespace Database\Seeders;

use App\Imports\CeritaImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = public_path('data.xlsx');
        Excel::import(new CeritaImport, $file);
    }
}
