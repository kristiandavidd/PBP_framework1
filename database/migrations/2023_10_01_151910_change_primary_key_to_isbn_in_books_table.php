<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePrimaryKeyToIsbnInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropPrimary(); // Hapus primary key yang ada
            $table->string('isbn')->primary(); // Tambahkan kolom 'isbn' sebagai primary key
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropPrimary(); // Hapus primary key 'isbn'
            $table->id(); // Kembalikan kolom 'id' sebagai primary key
        });
    }
}
