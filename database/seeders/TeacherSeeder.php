<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //using the factory
        Teacher::factory()->create();
    }
}