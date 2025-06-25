<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('washing_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained();
            $table->date('task_date');
            $table->string('status')->default('pending');
            $table->boolean('interior_clean_before')->default(false);
            $table->boolean('interior_clean_after')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('washing_tasks');
    }
};
