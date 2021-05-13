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
            $table->string('g_01')->nullable();
            $table->string('g_02')->nullable(); 
            $table->integer('g_03')->nullable(); 
            $table->integer('g_04')->nullable(); 
            $table->string('g_05')->nullable(); 
            $table->string('g_06')->nullable();
            /* Wholesale CT questions */
            $table->string('r_ct_001')->nullable();
            $table->string('r_ct_002')->nullable();
            $table->string('r_ct_003')->nullable();
            $table->string('r_ct_005')->nullable();
            $table->string('r_ct_006')->nullable();
            $table->string('r_ct_007')->nullable();
            $table->string('r_ct_008')->nullable();
            $table->string('r_ct_009')->nullable();
            $table->string('r_ct_010')->nullable();
            $table->string('r_ct_011')->nullable();
            $table->bigInteger('r_ct_012')->nullable();
            /* Inventory CT questions */
            $table->string('i_ct_001')->nullable();
            $table->string('i_ct_002')->nullable();
            $table->string('i_ct_003')->nullable();
            $table->string('i_ct_004')->nullable();
            $table->string('i_ct_005')->nullable();
            $table->string('i_ct_006')->nullable();
            $table->string('i_ct_007')->nullable();
            /* Mix CT questions */
            $table->string('rw_ct_001')->nullable();
            $table->string('ri_ct_002')->nullable();
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
