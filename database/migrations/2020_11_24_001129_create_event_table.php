<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('eventcategory')->onDelete('cascade')->onUpdate('cascade');
            $table->date('eventDateForm');
            $table->date('eventDateTo');
            $table->date('registerStartDate');
            $table->date('registerEndDate');
            $table->string('poster');
            $table->string('banner');
            $table->date('postedDate');
            $table->unsignedBigInteger('postedBy');
            $table->foreign('postedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('surveyRequired');
            $table->boolean('certificateAvailable');
            $table->string('organizer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
