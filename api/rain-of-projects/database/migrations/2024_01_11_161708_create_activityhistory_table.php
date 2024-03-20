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
        Schema::create('activityhistories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('tags_id');
            $table->unsignedBigInteger('projects_id');
            $table->unsignedBigInteger('groups_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activityhistories');
    }
};
