@extends('layout')

@section('content')
<section>
    <div class="card bg-light">
        <div class="card-header">
            <h1>Add New Job</h1>
        </div>

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Start Form -->
            <form method="post" action="{{ route('jobs.store') }}">
                @csrf
                <!-- Form EQUIPMENT INFO Section -->
                <section>
                    <h2>Equipment Information</h2>
                    <fieldset class="row">
                        <div class="form-group col-sm">
                            <label for="job_number">Job number:</label>
                            <input type="number" class="form-control" name="job_number">
                        </div>
                        <div class="form-group col-sm">
                            <label for="modality">Modality:</label>
                            <select type="text" id="modality-selector" class="form-control" name="modality">
                                <option value="">Select an option</option>
                                <option value="CT-Scanner">CT-Scanner</option>
                                <option value="C-Arm">C-Arm</option>
                                <option value="X-Rays">X-Rays</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="job_type">Job type:</label>
                            <select type="text" id="job-type-selector" class="form-control" name="job_type">
                                <option value="">Select an option</option>
                                <option value="Wholesale">Wholesale</option>
                                <option value="Retail">Retail</option>
                                <option value="Inventory">Inventory</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="row">
                        <div class="form-group col-sm">
                            <label for="g_01">Equipment manufacturer:</label>
                            <input type="text" class="form-control" name="g_01">
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="g_02">Equipment model:</label>
                            <input type="text" class="form-control" name="g_02">
                            </select>
                        </div>
                    </fieldset>
                </section>
                <!-- Form EQUIPMENT INFO Section -->
                <section>
                    <hr>   
                    <h2>Contact Information</h2>
                    <fieldset class="row">
                        <div class="form-group col-sm">
                            <label for="g_03"><b>GMID</b> of company we are <b>buying</b> from:</label>
                            <input type="text" class="form-control" name="g_03">
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="g_04"><b>GMID</b> of company we are <b>selling</b> to:</label>
                            <input type="text" class="form-control" name="g_04">
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="row">
                        <div class="form-group col-sm">
                        <label for="g_05">Is the equipment going to be inspected prior to payment:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="g_05" id="g_05_y" value="Yes">
                                    <label class="form-check-label" for="g_05_y">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="g_05" id="g_05_n" value="No">
                                    <label class="form-check-label" for="g_05_n">No</label>
                                </div>
                            </div>
                        </div>
                        <div id="g_06" class="form-group col-sm">
                            <label for="g_06">If yes, what is the GMID of company inspecting the equipment:</label>
                            <input type="number" class="form-control" name="g_06">
                            </select>
                        </div>
                    </fieldset>
                </section>
                <!-- Form CT PRODUCTION INFO Section -->
                <section id="CT-Scanner">
                    <section class="productionInformation">
                        <hr>
                        <h2>Production Information (CT-Scanner)</h2>
                        <!-- Form CT RETAIL PRODUCTION INFO Section -->
                        <section id="CT-ScannerRetail" class="Retail">
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label>Is the unit being painted?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_001" id="r_ct_001_y" value="Yes">
                                            <label class="form-check-label" for="r_ct_001_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_001" id="r_ct_001_n" value="No" >
                                            <label class="form-check-label" for="r_ct_001_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label>Does it need a new tube?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_002" id="r_ct_002_y" value="Yes">
                                            <label class="form-check-label" for="r_ct_002_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_002" id="r_ct_002_n" value="No" >
                                            <label class="form-check-label" for="r_ct_002_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label for="r_ct_005">Is Amber providing Gamma Tech drawings?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_005" id="r_ct_005_y" value="Yes">
                                            <label class="form-check-label" for="r_ct_005_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_005" id="r_ct_005_n" value="No" >
                                            <label class="form-check-label" for="r_ct_005_n">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="r_ct_003">Name of Facility to be imputed into the Machine:</label>
                                    <input type="text" class="form-control" name="r_ct_003">
                                </div>     
                                <div class="form-group col-sm">
                                    <label for="job_number">Who is the POC in-order to obtain room dimensions?</label>
                                    <input type="text" class="form-control" name="r_ct_006">
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="r_ct_007">Has the customer chosen a contractor?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_007" id="r_ct_007_y" value="Yes">
                                            <label class="form-check-label" for="r_ct_007_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_007" id="r_ct_007_n" value="No" >
                                            <label class="form-check-label" for="r_ct_007_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label for="r_ct_008">If yes, what is the contractor's GMID?</label>
                                    <input type="text" class="form-control" name="r_ct_008">
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="r_ct_009">Is Amber providing training and applications for the CT Scanner?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_009" id="r_ct_009_y" value="Yes" >
                                            <label class="form-check-label" for="r_ct_009_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_009" id="r_ct_009_n" value="No" >
                                            <label class="form-check-label" for="r_ct_009_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label for="r_ct_010">Will the images need to be directed to a specific PACS provider?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_010" id="r_ct_010_y" value="Yes" >
                                            <label class="form-check-label" for="r_ct_010_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r_ct_010" id="r_ct_010_n" value="No" >
                                            <label class="form-check-label" for="r_ct_010_n">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <section id="customer_it_person_contact_info">
                                <label for="r_ct_011"><u>Customer's IT person contact information:</u></label>
                                <fieldset class="row">
                                    <div class="form-group col-sm">
                                        <label for="r_ct_011">Complete name?</label>
                                        <input class="form-control" type="text" name="r_ct_011">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_012">Phone number? <small>(Format: 1234567890)</small></label>
                                        <input class="form-control" type="tel" name="r_ct_012" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                    </div>
                                </fieldset>
                            </section>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="rw_ct_001">Is an Amber employee performing the mechanical installation?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rw_ct_001" id="rw_ct_001_y" value="Yes">
                                            <label class="form-check-label" for="rw_ct_001_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rw_ct_001" id="rw_ct_001_n" value="No">
                                            <label class="form-check-label" for="rw_ct_001_n">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="ri_ct_001">Any additional parts or notes for Amber's production needed?</label>
                                    <input class="form-control" type="text" name="ri_ct_001">
                                </div> 
                            </fieldset>        
                            <!-- CT Retail shipping section -->         
                            <section>
                                <hr>
                                <h2>Shipping Information</h2>
                                <section id="information-of-facility-to-be-shipped-to">
                                    <label><u>Name and address of where the CT Scanner is going to be shipped to:</u></label>
                                    <fieldset class="row">
                                        <div class="form-group col-sm">
                                            <label for="r_ct_013">Name of company or facility?</label>
                                            <input class="form-control" type="text" name="r_ct_013">
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="r_ct_014">Company or facility address?</label>
                                            <input class="form-control" type="tel" name="r_ct_014">
                                        </div>
                                    </fieldset>
                                </section>
                                <section id="customer_person_contact_info">
                                    <label><u>POC person information:</u></label>
                                    <fieldset class="row">
                                        <div class="form-group col-sm">
                                            <label for="r_ct_015">Name of POC person?</label>
                                            <input class="form-control" type="text" name="r_ct_015">
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="r_ct_016">Phone number? <small>(Format: 1234567890)</small></label>
                                            <input class="form-control" type="tel" name="r_ct_016" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="r_ct_017">Email address?</label>
                                            <input class="form-control" type="email" name="r_ct_017">
                                        </div>
                                    </fieldset>
                                </section> 
                                <fieldset class="row">
                                    <div class="form-group col-sm">
                                        <label for="r_ct_018">Desired delivery day:</label>
                                        <input class="form-control" type="text" name="r_ct_018">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_019">What floor will the CT Scanner by delivery to:</label>
                                        <input class="form-control" type="tel" name="r_ct_019">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_020">Does the Facility have a loading Dock?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_020" id="r_ct_020_y" value="Yes">
                                                <label class="form-check-label" for="r_ct_020_y">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_020" id="r_ct_020_n" value="No">
                                                <label class="form-check-label" for="r_ct_020_n">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset> 
                            </section>
                            <!-- CT Retail accounting section -->         
                            <section>
                                <hr>
                                <h2>Accounting Information</h2>
                                <fieldset class="row">
                                    <div class="form-group col-sm">
                                        <label for="r_ct_021">Is the CT Scanner being financed by a third party?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_021" id="r_ct_021_y" value="Yes">
                                                <label class="form-check-label" for="r_ct_021_y">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_021" id="r_ct_021_n" value="No">
                                                <label class="form-check-label" for="r_ct_021_n">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_022">Has Amber received deposit moneis?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_022" id="r_ct_022_y" value="Yes">
                                                <label class="form-check-label" for="r_ct_022_y">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_022" id="r_ct_022_n" value="No">
                                                <label class="form-check-label" for="r_ct_022_n">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_023">Is the balance due upon delivery and installation?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_023" id="r_ct_023_y" value="Yes">
                                                <label class="form-check-label" for="r_ct_023_y">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_023" id="r_ct_023_n" value="No">
                                                <label class="form-check-label" for="r_ct_023_n">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                    <div class="form-group col-sm">
                                        <label for="r_ct_024">Does Amber need to send deposit monies to the seller in-order to secure the CT Scanner?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_024" id="r_ct_024_y" value="Yes">
                                                <label class="form-check-label" for="r_ct_024_y">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="r_ct_024" id="r_ct_024_n" value="No">
                                                <label class="form-check-label" for="r_ct_024_n">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_025">How much deposit moneis are required?</label>
                                        <input class="form-control" type="tel" name="r_ct_025">
                                    </div>
                                    <div class="form-group col-sm">
                                        <label for="r_ct_026">When does the deposit moneis need to arrive?</label>
                                        <input class="form-control" type="tel" name="r_ct_026">
                                    </div>
                                </fieldset> 
                            </section>
                        </section>
                        <!-- Form CT INVENTORY PRODUCTION INFO Section -->
                        <section id="CT-ScannerInventory" class="Inventory">
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label>Is Amber deinstalling the scanner?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_001" id="i_ct_001_y" value="Yes">
                                            <label class="form-check-label" for="i_ct_001_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_001" id="i_ct_001_n" value="No" >
                                            <label class="form-check-label" for="i_ct_001_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label for="i_ct_002">What floor is the scanner located?</label>
                                    <input class="form-control" type="number" name="i_ct_002">
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label>Are riggers required?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_003" id="i_ct_003_y" value="Yes">
                                            <label class="form-check-label" for="i_ct_003_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_003" id="i_ct_003_n" value="No" >
                                            <label class="form-check-label" for="i_ct_003_n">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label>Do they have a loading dock that is dock high?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_004" id="i_ct_004_y" value="Yes">
                                            <label class="form-check-label" for="i_ct_004_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="i_ct_004" id="i_ct_004_n" value="No" >
                                            <label class="form-check-label" for="i_ct_004_n">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <label for="i_ct_005">What hours do we have access to the scanner?</label>
                                    <input class="form-control" type="text" name="i_ct_005">
                                </div>   
                            </fieldset>
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="ri_ct_001">Any additional parts or notes for Amber's production needed?</label>
                                    <input class="form-control" type="text" name="ri_ct_001">
                                </div>   
                            </fieldset>
                        </section>
                        <!-- Form CT WHOLESALE PRODUCTION INFO Section -->
                        <section id="CT-ScannerWholesale" class="Wholesale">
                            <fieldset class="row">
                                <div class="form-group col-sm">
                                    <label for="rw_ct_001">Is an Amber employee performing the mechanical installation?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rw_ct_001" id="rw_ct_001_y" value="Yes">
                                            <label class="form-check-label" for="rw_ct_001_y">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rw_ct_001" id="rw_ct_001_n" value="No">
                                            <label class="form-check-label" for="rw_ct_001_n">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </section>
                    </section>
                </section>
                <!-- Form C-Arm PRODUCTION INFO Section -->
                <section id="C-Arm">
                    <section class="productionInformation">
                        <hr>
                        <h2>Production Information (C-Arm)</h2>
                    </section>
                    <!-- Form C-Arm SHIPPING INFO Section -->
                    <section class="shippingInfo">
                        <hr>
                        <h2>Shipping Information</h2>
                    </section>
                </section>
                <!-- Form X-Rays PRODUCTION INFO Section -->
                <section id="X-Rays">
                    <section class="productionInformation">
                        <hr>
                        <h2>Production Information (X-Rays)</h2>
                    </section>
                    <!-- Form X-Rays SHIPPOING INFO Section -->
                    <section class="shippingInfo">
                        <hr>
                        <h2>Shipping Information</h2>
                    </section>
                </section>
                <!-- Form SUBMIT Section -->
                <section>
                    <hr>
                    <fieldset class="row">
                        <div class="form-group col-sm">
                            <button type="submit" class="btn btn-primary float-right">Add Job</button>
                        </div>
                    </fieldset>
                </section>
            </form>
            <!-- End Form -->
        </div>
    </div>
</section>
@endsection