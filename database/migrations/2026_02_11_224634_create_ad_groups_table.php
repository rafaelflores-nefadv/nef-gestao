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
        Schema::create('ad_groups', function (Blueprint $table) {
                        $table->foreignId('company_id')->constrained('companies')->index();
            $table->id();
            $table->string('name')->unique();
            $table->string('dn')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_groups');
    }
};
