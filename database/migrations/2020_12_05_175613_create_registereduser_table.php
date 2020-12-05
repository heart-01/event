<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistereduserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registereduser', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('event_id')->on('event')->onDelete('cascade')->onUpdate('cascade');
            $table->date('registered_date');
            $table->string('certificate_code')->nullable();
            $table->string('certificate_file')->nullable();
            $table->date('certificate_issue_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registereduser');
    }
}
