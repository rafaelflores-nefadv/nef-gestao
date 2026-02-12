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
        Schema::create('profiles', function (Blueprint $table) {
                        $table->foreignId('company_id')
                            ->constrained('companies')
                            ->index()
                            ->onDelete('cascade')
                            ->name('profiles_company_id_foreign');
            $table->id();
            $table->string('name');
            $table->foreignId('sector_id')->nullable()->constrained('sectors');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
