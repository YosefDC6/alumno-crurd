<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $sis = Career::firstWhere('nombre','Ingeniería en Sistemas');
        Student::factory()->create([
            'nombre'    => 'Ana Pérez',
            'correo'    => 'ana@example.com',
            'career_id' => $sis->id ?? Career::inRandomOrder()->first()->id,
            'semestre'  => 3,
        ]);
    }
}

