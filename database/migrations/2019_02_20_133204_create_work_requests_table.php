<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workCatId');
            $table->text('requestNo');
            $table->text('bidderNo');
            $table->text('address');
            $table->text('contractor');
            $table->text('price');
            $table->text('balanceItem');
            $table->text('days');
            $table->text('notes');
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
        Schema::dropIfExists('work_requests');
    }
}
