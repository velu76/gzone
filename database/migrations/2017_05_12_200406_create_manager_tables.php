<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manager_id');            
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');           
            $table->timestamps();
        });

        Schema::create('manager_project', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('manager_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('manager_user')->onDelete('cascade');
            $table->dateTime('active_from')->useCurrent=true;
            $table->dateTime('active_till')->useCurrent=true;         
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
        Schema::dropIfExists('manager_project');
        Schema::dropIfExists('manager_user');
    }
}
