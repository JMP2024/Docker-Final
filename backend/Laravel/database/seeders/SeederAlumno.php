<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;


class SeederAlumno extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumnos = [
            [
                'nombre' => 'Jorge Martínez',
                'telefono' => '634488702',
                'edad' => 24,
                'password' => '1234',
                'email' => '2024mape@gmail.com',
                'sexo' => 'masculino',
            ],
            [
             'nombre' => 'Pepe Martínez',
                'telefono' => '614488702',
                'edad' => 98,
                'password' => '4321',
                'email' => '2025epep@gmail.com',
                'sexo' => 'masculino',   
            ],
            ['nombre' => 'Buba Lorenzo',
                'telefono' => '666488702',
                'edad' => 56,
                'password' => '5656',
                'email' => '2bp1@gmail.com',
                'sexo' => 'femenino',]
            ];

        foreach ($alumnos as $alumno) {
            DB::table('alumno')->updateOrInsert(
                ['email' => $alumno['email']], // Condición para evitar duplicados
                $alumno // Datos a insertar o actualizar
            );
        }
    }
}
