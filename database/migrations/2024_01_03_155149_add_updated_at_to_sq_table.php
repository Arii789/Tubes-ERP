<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToSqTable extends Migration
{
    public function up()
    {
        Schema::table('sq', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('sq', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
