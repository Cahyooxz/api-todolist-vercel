<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 0;
        for($i=0; $i < 10; $i++){
            $data = [
                'category_id' => 1,
                'judul' => 'judul '.$i,
                'deskripsi' => 'deskripsi '.$i,
                'level_kegiatan' => 1,
                'tanggal_deadline' => "2023-11-15T14:30:45",
            ];
            Todolist::create($data);
        }
        }
}
