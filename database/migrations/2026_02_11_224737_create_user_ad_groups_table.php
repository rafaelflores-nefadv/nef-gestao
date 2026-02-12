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
        Schema::create('user_ad_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_ad_groups_user_id_index');
            $table->foreign('user_id', 'user_ad_groups_user_id_foreign')->references('id')->on('users');
            $table->foreignId('ad_group_id')->constrained('ad_groups');
            $table->string('source')->default('profile'); // profile ou manual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ad_groups');
    }
};
