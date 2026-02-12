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
        Schema::create('profile_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->index('profile_id', 'profile_groups_profile_id_index');
            $table->foreign('profile_id', 'profile_groups_profile_id_foreign')->references('id')->on('profiles');
            $table->foreignId('ad_group_id')->constrained('ad_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_groups');
    }
};
