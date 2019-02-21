<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('fileNo');
            $table->text('applicationNo');
            $table->text('address');
            $table->text('closeDate');
            $table->text('projectNo');
            $table->text('areaNo');
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
        Schema::dropIfExists('work_applications');
    }
}
