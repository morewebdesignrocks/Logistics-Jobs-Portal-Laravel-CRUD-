@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h3>Add New Job</h3>
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
        <form method="post" action="{{ route('jobs.store') }}">
            @csrf
            <!-- Form EQUIPMENT INFO Section -->
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
                        <select type="text" class="form-control" name="job_type" onchange="showHideJobType(value, ['WholesaleCT-Scanner'])">
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
                        <label for="g_03">GMID of company we are <b>buying</b> from:</label>
                        <input type="text" class="form-control" name="g_03">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="g_04">GMID of company we are <b>selling</b> to:</label>
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
                    <div id="g_06" class="form-group col" style="display: none;">
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
                    <!-- Form CT WHOLESALE PRODUCTION INFO Section -->
                    <section id="WholesaleCT-Scanner" style="display: none;">
                        <fieldset class="row">
                            <div class="form-group col">
                                <label>Is the unit being painted?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_001" id="w_ct_001_y" value="Yes">
                                        <label class="form-check-label" for="w_ct_001_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_001" id="w_ct_001_n" value="No" >
                                        <label class="form-check-label" for="w_ct_001_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label>Does it need a new tube?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_002" id="w_ct_002_y" value="Yes">
                                        <label class="form-check-label" for="w_ct_002_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_002" id="w_ct_002_n" value="No" >
                                        <label class="form-check-label" for="w_ct_002_n">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="w_ct_003">Name of Facility to be imputed into the Machine:</label>
                                <input type="text" class="form-control" name="w_ct_003">
                            </div>
                            <div class="form-group col">
                                <label for="w_ct_004">Any additional parts or notes for Amber's production needed?</label>
                                <input type="text" class="form-control" name="w_ct_004">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="w_ct_005">Is Amber providing Gamma Tech drawings?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_005" id="w_ct_005_y" value="Yes">
                                        <label class="form-check-label" for="w_ct_005_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_005" id="w_ct_005_n" value="No" >
                                        <label class="form-check-label" for="w_ct_005_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="job_number">Who is the POC in-order to obtain room dimensions?</label>
                                <input type="text" class="form-control" name="w_ct_006">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                        <div class="form-group col">
                                <label for="w_ct_007">Has the customer chosen a contractor?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_007" id="w_ct_007_y" value="Yes">
                                        <label class="form-check-label" for="w_ct_007_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_007" id="w_ct_007_n" value="No" >
                                        <label class="form-check-label" for="w_ct_007_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="w_ct_008">If yes, what is the contractor's GMID?</label>
                                <input type="text" class="form-control" name="w_ct_008">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="w_ct_009">Is Amber providing training and applications for the CT Scanner?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_009" id="w_ct_009_y" value="Yes">
                                        <label class="form-check-label" for="w_ct_009_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_009" id="w_ct_009_n" value="No" >
                                        <label class="form-check-label" for="w_ct_009_n">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="w_ct_010">Will the images need to be directed to a specific PACS provider?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_010" id="w_ct_010_y" value="Yes" onchange="showHideYesNo(value, 'cutomer_it_person_contact_info')">
                                        <label class="form-check-label" for="w_ct_010_y">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="w_ct_010" id="w_ct_010_n" value="No" onchange="showHideYesNo(value, 'cutomer_it_person_contact_info')">
                                        <label class="form-check-label" for="w_ct_010_n">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <section id="cutomer_it_person_contact_info" style="display: none;">
                            <label for="job_number"><u>Customer's IT person contact information:</u></label>
                            <fieldset class="row">
                                <div class="form-group col">
                                    <label for="w_ct_011">Complete name:</label>
                                    <input class="form-control" type="text" name="w_ct_011">
                                </div>
                                <div class="form-group col">
                                    <label for="w_ct_012">Phone number: <small>Format: 123-456-7890</small></label>
                                    <input class="form-control" type="tel" name="w_ct_012" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                </div>
                            </fieldset>
                        </section>
                    </section>
                </section>
                <!-- Form   C-Arm SHIPPOING INFO Section -->
                <section class="shippingInfo">
                    <hr>
                    <h4 class="h4">Shipping Information</h4>
                </section>
            </section>
            <!-- Form C-Arm PRODUCTION INFO Section -->
            <section id="C-ArmProductionInfo" style="display: none;">
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
            <section id="X-RaysProductionInfo" style="display: none;">
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
                    <button type="submit" class="btn btn-primary">Add Job</button>
                    </div>
                </fieldset>
            </section>
        </form>
    </div>
</div>
@endsection