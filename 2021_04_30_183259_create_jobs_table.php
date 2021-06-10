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
            $table->integer('job_number')->unique(); // Job number:
            $table->string('modality'); // Modality:
            $table->string('job_type'); // Job type:
            $table->string('g_01')->nullable(); // Equipment manufacturer:
            $table->string('g_02')->nullable(); // Equipment model:
            $table->integer('g_03')->nullable(); // GMID of company we are buying from:
            $table->integer('g_04')->nullable(); // GMID of company we are selling to:
            $table->string('g_05')->nullable(); // Is equipment going to be inspected prior to payment: yes/no
            $table->string('g_06')->nullable(); // GMID of company inspecting the equipment:
            /* Retail CT questions */
            $table->string('r_ct_001')->nullable(); // Is the unit being painted?
            $table->string('r_ct_002')->nullable(); // Does it need a new tube?
            $table->string('r_ct_003')->nullable(); // Name of Facility to be imputed into the Machine?
            $table->string('r_ct_005')->nullable(); // Is Amber providing Gamma Tech drawings? yes/no
            $table->string('r_ct_006')->nullable(); // Who is the POC in-order to obtain room dimensions?
            $table->string('r_ct_007')->nullable(); // Has the customer chosen a contractor? yes/no
            $table->string('r_ct_008')->nullable(); // If yes, what is the contractor's GMID?
            $table->string('r_ct_009')->nullable(); // Is Amber providing training and applications for the CT Scanner? yes/no
            $table->string('r_ct_010')->nullable(); // Will the images need to be directed to a specific PACS provider? yes/no
            $table->string('r_ct_011')->nullable(); // Customer's IT person contact information: Complete Name?
            $table->bigInteger('r_ct_012')->nullable(); // Customer's IT person contact information: Phone number?
            $table->string('r_ct_013')->nullable(); // Name and address of where the CT Scanner is going to be shipped to: Name of company or facility?
            $table->string('r_ct_014')->nullable(); // Name and address of where the CT Scanner is going to be shipped to: Company or facility address?
            $table->string('r_ct_015')->nullable(); // POC person information: Name of POC person?
            $table->bigInteger('r_ct_016')->nullable(); // POC person information: Phone number?
            $table->string('r_ct_017')->nullable(); // POC person information: Email address?
            $table->string('r_ct_018')->nullable(); // Desired delivery day?
            $table->string('r_ct_019')->nullable(); // What floor will the CT Scanner by delivery to?
            $table->string('r_ct_020')->nullable(); // Does the Facility have a loading Dock? yes/no
            $table->string('r_ct_021')->nullable(); // Is the CT Scanner being financed by a third party? yes/no
            $table->string('r_ct_022')->nullable(); // Has Amber received deposit moneis? yes/no
            $table->string('r_ct_023')->nullable(); // Is the balance due upon delivery and installation? yes/no
            $table->string('r_ct_024')->nullable(); // Does Amber need to send deposit monies to the seller in-order to secure the CT Scanner? yes/no
            $table->integer('r_ct_025')->nullable(); // How much deposit moneis are required?
            $table->string('r_ct_026')->nullable(); // When does the deposit moneis need to arrive?

            /* Inventory CT questions */
            $table->string('i_ct_001')->nullable(); // Is Amber deinstalling the scanner? yes/no
            $table->string('i_ct_002')->nullable(); // What floor is the scanner located?
            $table->string('i_ct_003')->nullable(); // Are riggers required? yes/no
            $table->string('i_ct_004')->nullable(); // Do they have a loading dock that is dock high? yes/no
            $table->string('i_ct_005')->nullable(); // What hours do we have access to the scanner?

            /* Mix CT questions */
            $table->string('rw_ct_001')->nullable(); // Do you want an Amber employee to perform the mechanical installation? yes/no 
            $table->string('ri_ct_001')->nullable(); // Any additional parts or notes for Amber's production needed? 
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
