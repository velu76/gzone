<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_user', function (Blueprint $table) {
            $table->increments('id');                         
            $table->unsignedInteger('member_id');            
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');           
            $table->timestamps();
        });

        Schema::create('member_project', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();;
            $table->unsignedInteger('member_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('member_user')->onDelete('cascade');
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
        Schema::dropIfExists('member_project');
        Schema::dropIfExists('member_user');
    }
}
