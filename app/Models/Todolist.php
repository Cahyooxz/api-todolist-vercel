<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'table_todolist';

    protected $fillable = [
        'category_id',
        'judul',
        'deskripsi',
        'level_kegiatan',
        'tanggal_deadline',
        'status'
    ];

}
