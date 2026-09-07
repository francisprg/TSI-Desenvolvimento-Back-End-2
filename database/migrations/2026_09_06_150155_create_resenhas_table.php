<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resenhas', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->date('datapublicacao')->default(DB::raw('CURRENT_DATE'));
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resenhas');
    }
};