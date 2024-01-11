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
        Schema::create('activityhistory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('users_id');
            $table->integer('tags_id');
            $table->integer('projects_id');
            $table->integer('groups_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activityhistory');
    }
};
