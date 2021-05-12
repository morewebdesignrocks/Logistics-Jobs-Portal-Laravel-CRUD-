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
            $table->timestamps();
            /* General questions */
            $table->integer('job_number')->unique();
            $table->string('modality');
            $table->string('job_type');
            $table->string('g_01');
            $table->string('g_02'); 
            $table->integer('g_03'); 
            $table->integer('g_04'); 
            $table->string('g_05'); 
            $table->string('g_06');
            /* Wholesale CT questions */
            $table->string('r_ct_001');
            $table->string('r_ct_002');
            $table->string('r_ct_003');
            $table->string('r_ct_004');
            $table->string('r_ct_005');
            $table->string('r_ct_006');
            $table->string('r_ct_007');
            $table->string('r_ct_008');
            $table->string('r_ct_009');
            $table->string('r_ct_010');
            $table->string('r_ct_011');
            $table->bigInteger('r_ct_012');
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
