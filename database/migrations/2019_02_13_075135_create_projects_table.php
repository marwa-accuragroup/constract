<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('projectNo');
            $table->text('projectName');
            $table->text('projectCategory');
            $table->text('contractorName');
            $table->text('projectSite');
            //
            $table->text('contractValue');
            $table->text('valueAdded');
            $table->text('estimateValue');
            $table->text('finalValue');
            $table->text('contractualValue');

            //
            $table->date('startDate');
            $table->date('endDate');
            $table->date('endDateEdit');
            $table->date('subtractionDate');
            $table->date('contractDate');

            //
            $table->text('completionRate');
            $table->text('currentSituation');
            $table->text('supervisors');
            $table->text('beneficiaries');

            $table->text('buildingArea');
            $table->text('landArea');
            $table->text('projectEngineer');
            $table->text('approveSchemas');
            $table->text('executionByDays');
            $table->text('done');
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
        Schema::dropIfExists('projects');
    }
}
