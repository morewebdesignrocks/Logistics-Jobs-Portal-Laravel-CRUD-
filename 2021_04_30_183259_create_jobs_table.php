<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('job_number')->unique();
            $table->string('modality');
            $table->string('job_type');
            $table->string('equipment_manufacturer');
            $table->string('equipment_model'); 
            $table->string('gmid_company_we_buy_from'); 
            $table->string('gmid_company_we_sell_to'); 
            $table->string('equipment_requires_inspection'); 
            $table->string('gmid_company_inspecting_equipment');           
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
        Schema::dropIfExists('jobs');
    }
}
