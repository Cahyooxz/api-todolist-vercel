<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_todolist', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_id')->nullable()->comment('1 = personal, 2=work, 3 = shopping, 4=health, 5=college, 6=random');
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->tinyInteger('level_kegiatan')->nullable()->comment('1: rendah, 2: sedang, 3: prioritas');
            $table->dateTime('tanggal_deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_todolist');
    }
};
