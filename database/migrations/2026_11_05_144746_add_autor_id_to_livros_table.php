
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->foreignId('autor_id')
                ->nullable()
                ->after('autor')
                ->constrained('autores')
                ->nullOnDelete();
        });

        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('autor');
        });
    }

    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->string('autor', 150)->nullable();
        });

        Schema::table('livros', function (Blueprint $table) {
            $table->dropConstrainedForeignId('autor_id');
        });
    }
};
