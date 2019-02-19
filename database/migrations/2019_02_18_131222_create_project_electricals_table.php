<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectElectricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_electricals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projectId');
            $table->integer('beneficiaries');
            $table->text('buildingNumber');
            $table->text('electricityNumber');

            //الوضع الحالى لرسوم التوصيل
            $table->text('currentStatusOfConnectionCharges');
            $table->text('waterElectric');
            $table->text('waterElectricImg');
            $table->text('financial');
            $table->text('financialImg');
            $table->text('minister');
            $table->text('ministerImg');
            $table->text('letter');
            $table->text('letterImg');
            $table->text('connectPower');
            $table->text('notes');

            //لوضع الحالى لتكلفه مواد البناء
            $table->text('currentStatusMaterials');
            $table->text('waterElectricMaterials');
            $table->text('waterElectricMaterialsImg');
            $table->text('financialMaterials');
            $table->text('financiaMaterialslImg');
            $table->text('ministerMaterials');
            $table->text('ministerMaterialsImg');
            $table->text('letterMaterials');
            $table->text('letterMaterialsImg');
            $table->text('materialsToContractor');
            $table->text('notesMaterials');


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
        Schema::dropIfExists('project_electricals');
    }
}
