@extends('layout')

@section('content')


<div class="card mt-5">
    <div class="card-header">
        Update
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
        <form method="post" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PATCH')
        <section>
                <h4 class="h4">Equipment Information</h4>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="job_number">Job number:</label>
                        <input type="number" class="form-control" name="job_number">
                    </div>
                    <div class="form-group col">
                        <label for="modality">Modality:</label>
                        <select type="text" class="form-control" name="modality" onchange="showHideModality(value, ['C-ArmProductionInfo', 'X-RaysProductionInfo', 'CT-ScannerProductionInfo'])">
                            <option value="">Select an option</option>
                            <option value="CT-Scanner">CT-Scanner</option>
                            <option value="C-Arm">C-Arm</option>
                            <option value="X-Rays">X-Rays</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="job_type">Job type:</label>
                        <select type="text" class="form-control" name="job_type" onchange="showHideJobType(value, ['RetailCT-Scanner', 'InventoryCT-Scanner', 'WholesaleCT-Scanner'])">
                            <option value="">Select an option</option>
                            <option value="Wholesale">Wholesale</option>
                            <option value="Retail">Retail</option>
                            <option value="Inventory">Inventory</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="g_01">Equipment manufacturer:</label>
                        <input type="text" class="form-control" name="g_01">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="g_02">Equipment model:</label>
                        <input type="text" class="form-control" name="g_02">
                        </select>
                    </div>
                </fieldset>
            </section>
            <!-- Form EQUIPMENT INFO Section -->
            <section>
                <hr>   
                <h4 class="h4">Contact Information</h4>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="g_03"><b>GMID</b> of company we are <b>buying</b> from:</label>
                        <input type="text" class="form-control" name="g_03">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="g_04"><b>GMID</b> of company we are <b>selling</b> to:</label>
                        <input type="text" class="form-control" name="g_04">
                        </select>
                    </div>
                </fieldset>
                <fieldset class="row">
                    <div class="form-group col">
                    <label for="g_05">Is equipment going to be inspected prior to payment:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="g_05" id="g_05_y" value="Yes" onchange="showHideYesNo(value, 'g_06')">
                                <label class="form-check-label" for="g_05_y">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="g_05" id="g_05_n" value="No" onchange="showHideYesNo(value, 'g_06')">
                                <label class="form-check-label" for="g_05_n">No</label>
                            </div>
                        </div>
                    </div>
                    <div id="g_06" class="form-group col">
                        <label for="g_06">GMID of company inspecting the equipment:</label>
                        <input type="number" class="form-control" name="g_06">
                        </select>
                    </div>
                </fieldset>
            </section>
            <!-- Form CT PRODUCTION INFO Section -->
            <section id="CT-ScannerProductionInfo" style="display: none;">
                <section class="productionInformation">
                    <hr>
                    <h4 class="h4">Production Information (CT-Scanner)</h4>
                    <!-- Form CT RETAIL PRODUCTION INFO Section -->
                    <section id="RetailCT-Scanner">
                        <fieldset class="row">
                            <div class="form-group col">
                                <label>Is the unit being painted?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_001" id="r_ct_001_y" value="Yes">
                                        <label class="form-check-label" for="r_ct_001_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_001" id="r_ct_001_n" value="No" >
                                        <label class="form-check-label" for="r_ct_001_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
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
                            <div class="form-group col">
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
                            <div class="form-group col">
                                <label for="r_ct_003">Name of Facility to be imputed into the Machine:</label>
                                <input type="text" class="form-control" name="r_ct_003">
                            </div>     
                            <div class="form-group col">
                                <label for="job_number">Who is the POC in-order to obtain room dimensions?</label>
                                <input type="text" class="form-control" name="r_ct_006">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
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
                            <div class="form-group col">
                                <label for="r_ct_008">If yes, what is the contractor's GMID?</label>
                                <input type="text" class="form-control" name="r_ct_008">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="r_ct_009">Is Amber providing training and applications for the CT Scanner?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_009" id="r_ct_009_y" value="Yes">
                                        <label class="form-check-label" for="r_ct_009_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_009" id="r_ct_009_n" value="No" >
                                        <label class="form-check-label" for="r_ct_009_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="r_ct_010">Will the images need to be directed to a specific PACS provider?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_010" id="r_ct_010_y" value="Yes" onchange="showHideYesNo(value, 'customer_it_person_contact_info')">
                                        <label class="form-check-label" for="r_ct_010_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="r_ct_010" id="r_ct_010_n" value="No" onchange="showHideYesNo(value, 'customer_it_person_contact_info')">
                                        <label class="form-check-label" for="r_ct_010_n">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <section id="customer_it_person_contact_info">
                            <label for="job_number"><u>Customer's IT person contact information:</u></label>
                            <fieldset class="row">
                                <div class="form-group col">
                                    <label for="r_ct_011">Complete name:</label>
                                    <input class="form-control" type="text" name="r_ct_011">
                                </div>
                                <div class="form-group col">
                                    <label for="r_ct_012">Phone number: <small>Format: 1234567890</small></label>
                                    <input class="form-control" type="tel" name="r_ct_012" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                </div>
                            </fieldset>
                        </section>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="rw_ct_002">Do you want an Amber employee to perform the mechanical installation?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rw_ct_002" id="rw_ct_002_y" value="Yes">
                                        <label class="form-check-label" for="rw_ct_002_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rw_ct_002" id="rw_ct_002_n" value="No">
                                        <label class="form-check-label" for="rw_ct_002_n">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row">
                        <div class="form-group col">
                                <label for="ri_ct_002">Any additional parts or notes for Amber's production needed?</label>
                                <input type="text" class="form-control" name="ri_ct_002">
                            </div>
                        <fieldset>
                    </section>
                    <!-- Form CT INVENTORY PRODUCTION INFO Section -->
                    <section id="InventoryCT-Scanner">
                        <fieldset class="row">
                            <div class="form-group col">
                                <label>Is Amber deinstalling the scanner?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="i_ct_001" id="i_ct_001_y" value="Yes">
                                        <label class="form-check-label" for="i_ct_001_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="i_ct_001" id="i_ct_001_n" value="No" >
                                        <label class="form-check-label" for="i_ct_001_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="i_ct_002">What floor is the scanner located?</label>
                                <input class="form-control" type="number" name="i_ct_002">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
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
                            <div class="form-group col">
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
                            <div class="form-group col">
                                <label for="i_ct_005">What hours do we have access to the scanner?</label>
                                <input class="form-control" type="text" name="i_ct_005">
                            </div>   
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="ri_ct_002">Any additional parts or notes for Amber's production needed?</label>
                                <input class="form-control" type="text" name="ri_ct_002">
                            </div>   
                        </fieldset>
                    </section>
                    <!-- Form CT INVENTORY PRODUCTION INFO Section -->
                    <section id="WholesaleCT-Scanner">
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="rw_ct_001">Do you want an Amber employee to perform the mechanical installation?</label>
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
                <!-- Form C-Arm SHIPPING INFO Section -->
                <section class="shippingInfo">
                    <hr>
                    <h4 class="h4">Shipping Information</h4>
                </section>
            </section>
            <!-- Form C-Arm PRODUCTION INFO Section -->
            <section id="C-ArmProductionInfo">
                <section class="productionInformation">
                    <hr>
                    <h4 class="h4">Production Information (C-Arm)</h4>
                </section>
                <!-- Form   C-Arm SHIPPOING INFO Section -->
                <section class="shippingInfo">
                    <hr>
                    <h4 class="h4">Shipping Information</h4>
                </section>
            </section>
            <!-- Form X-Rays PRODUCTION INFO Section -->
            <section id="X-RaysProductionInfo">
                <section class="productionInformation">
                    <hr>
                    <h4 class="h4">Production Information (X-Rays)</h4>
                </section>
                <!-- Form X-Rays SHIPPOING INFO Section -->
                <section class="shippingInfo">
                    <hr>
                    <h4 class="h4">Shipping Information</h4>
                </section>
            </section>
            <!-- Form SUBMIT Section -->
            <section>
                <hr>
                <fieldset class="row">
                    <div class="form-group col">
                    <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>
                </fieldset>
            </section>
        </form>
    </div>
</div>
@endsection