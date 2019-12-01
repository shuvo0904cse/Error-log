<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errorlogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method_name');
            $table->string('line_number');
            $table->string('file_path');
            $table->longText('exception_message');
            $table->string('object')->nullable();
            $table->string('type')->nullable();
            $table->string('screen_shot')->nullable();
            $table->string('page_url')->nullable();
            $table->string('arguments')->nullable();
            $table->string('prefix')->nullable();
            $table->string('domain')->nullable();
            $table->enum('is_resolved', ['Yes', 'No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('errorlogs');
    }
}
