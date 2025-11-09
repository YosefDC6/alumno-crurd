<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Ingeniería en Sistemas','Administración','Diseño Gráfico','Derecho'] as $n) {
            Career::firstOrCreate(['nombre'=>$n]);
        }
    }
}

