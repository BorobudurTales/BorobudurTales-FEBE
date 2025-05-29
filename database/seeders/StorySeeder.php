<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    public function run(): void
    {
        Story::create([
            'title' => 'Killing Living Beings',
            'description' => 'Relief ini menggambarkan pembunuhan makhluk hidup oleh para nelayan yang sedang menyiapkan perangkap mereka.',
            'image' => 'library/001.jpg',
        ]);

        Story::create([
            'title' => 'Rejoicing in Killing',
            'description' => 'Relief ini menunjukkan konsekuensi dari kegembiraan dalam membunuh, yang mengarah ke kehidupan yang singkat.',
            'image' => 'library/002.jpg',
        ]);

        Story::create([
            'title' => 'Destroying What is in the Womb',
            'description' => 'Menggambarkan kerusakan terhadap kehidupan sejak awal yang menyebabkan penderitaan.',
            'image' => 'library/003.jpg',
        ]);

        Story::create([
            'title' => 'Killing and Encouraging Killing',
            'description' => 'Relief ini memperlihatkan dampak buruk dari tindakan membunuh dan mendorong orang lain untuk melakukan hal yang sama.',
            'image' => 'library/004.jpg',
        ]);

        Story::create([
            'title' => 'Destroying People While Afraid',
            'description' => 'Menggambarkan tindakan merusak kehidupan dalam ketakutan dan kepanikan, membawa konsekuensi berat.',
            'image' => 'library/005.jpg',
        ]);

        Story::create([
            'title' => 'Speaking in Praise of Restraint',
            'description' => 'Relief ini menunjukkan pentingnya menahan diri dari membunuh dan dampak positifnya terhadap umur panjang.',
            'image' => 'library/006.jpg',
        ]);
    }
}
