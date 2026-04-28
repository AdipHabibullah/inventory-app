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
        Schema::table('products', function (Blueprint $table) {
            // 1. Tambah field description (nullable text)
            $table->text('description')->nullable()->after('stock');

            // 1. Tambah field status (enum, default: tersedia)
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia')->after('description');

            // 2. Ubah tipe data price dari integer menjadi bigInteger
            $table->bigInteger('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Rollback: hapus kolom yang ditambahkan
            $table->dropColumn(['description', 'status']);

            // Rollback: kembalikan price ke integer
            $table->integer('price')->change();
        });
    }
};