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
            $table->string('w_ct_001');
            $table->string('w_ct_002');
            $table->string('w_ct_003');
            $table->string('w_ct_004');
            $table->string('w_ct_005');
            $table->string('w_ct_006');
            $table->string('w_ct_007');
            $table->string('w_ct_008');
            $table->string('w_ct_009');
            $table->string('w_ct_010');
            $table->string('w_ct_011');
            $table->integer('w_ct_012');
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
