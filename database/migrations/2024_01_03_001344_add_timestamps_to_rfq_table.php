<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToRfqTable extends Migration
{
    public function up()
    {
        Schema::table('rfq', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('rfq', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
