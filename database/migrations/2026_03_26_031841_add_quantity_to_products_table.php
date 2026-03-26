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
            // Kita cek dulu apakah kolom sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('products', 'quantity')) {
                $table->integer('quantity')->after('name')->default(0);
            }
            
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 15, 2)->after('quantity')->default(0);
            }

            if (!Schema::hasColumn('products', 'user_id')) {
                $table->foreignId('user_id')->after('price')->constrained('users')->onDelete('cascade');
            }

            // Menambahkan created_at dan updated_at jika belum ada
            if (!Schema::hasColumns('products', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['quantity', 'price', 'user_id', 'created_at', 'updated_at']);
        });
    }
};