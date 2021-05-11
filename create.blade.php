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
                        <label for="equipment_manufacturer">Equipment manufacturer:</label>
                        <input type="text" class="form-control" name="equipment_manufacturer">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="equipment_model">Equipment model:</label>
                        <input type="text" class="form-control" name="equipment_model">
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
                        <label for="gmid_company_we_buy_from">GMID of company we are <b>buying</b> from:</label>
                        <input type="text" class="form-control" name="gmid_company_we_buy_from">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="gmid_company_we_sell_to">GMID of company we are <b>selling</b> to:</label>
                        <input type="text" class="form-control" name="gmid_company_we_sell_to">
                        </select>
                    </div>
                </fieldset>
                <fieldset class="row">
                    <div class="form-group col">
                    <label>Is equipment going to be inspected prior to payment:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="equipment_requires_inspection" id="equipment_requires_inspection_1" value="Yes" onchange="showHideYesNo(value, 'gmid_company_inspecting_equipment')">
                                <label class="form-check-label" for="equipment_requires_inspection_1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="equipment_requires_inspection" id="equipment_requires_inspection_2" value="No" onchange="showHideYesNo(value, 'gmid_company_inspecting_equipment')">
                                <label class="form-check-label" for="equipment_requires_inspection_2">No</label>
                            </div>
                        </div>
                    </div>
                    <div id="gmid_company_inspecting_equipment" class="form-group col" style="display: none;">
                        <label for="gmid_company_inspecting_equipment">GMID of company inspecting the equipment:</label>
                        <input type="text" class="form-control" name="gmid_company_inspecting_equipment">
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
                                        <input class="form-check-input" type="radio" name="is_unit_being_painted" id="is_unit_being_painted_01" value="Yes">
                                        <label class="form-check-label" for="is_unit_being_painted_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_unit_being_painted" id="is_unit_being_painted_02" value="No" >
                                        <label class="form-check-label" for="is_unit_being_painted_02">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label>Does it need a new tube?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="does_need_new_tube" id="does_need_new_tube_01" value="Yes">
                                        <label class="form-check-label" for="does_need_new_tube_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="does_need_new_tube" id="does_need_new_tube_02" value="No" >
                                        <label class="form-check-label" for="does_need_new_tube_02">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="job_number">Name of Facility to be imputed into the Machine:</label>
                                <input type="text" class="form-control" name="name_of_facility_to_be_imputed_into_the_machine">
                            </div>
                            <div class="form-group col">
                                <label for="job_number">Any additional parts or notes for Amber's production needed?</label>
                                <input type="text" class="form-control" name="other_parts_or_additional_notes_for_ambers_production">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="job_number">Is Amber providing Gamma Tech drawings?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_amber_providing_gamma_tech_drawings" id="is_amber_providing_gamma_tech_drawings_01" value="Yes">
                                        <label class="form-check-label" for="is_amber_providing_gamma_tech_drawings_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_amber_providing_gamma_tech_drawings" id="is_amber_providing_gamma_tech_drawings_02" value="No" >
                                        <label class="form-check-label" for="is_amber_providing_gamma_tech_drawings_02">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="job_number">Who is the POC in-order to obtain room dimensions?</label>
                                <input type="text" class="form-control" name="poc_in_order_to_obtain_room_dimensions">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                        <div class="form-group col">
                                <label for="job_number">Has the customer chosen a contractor?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="has_the_customer_chosen_a_contractor" id="has_the_customer_chosen_a_contractor_01" value="Yes">
                                        <label class="form-check-label" for="has_the_customer_chosen_a_contractor_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="has_the_customer_chosen_a_contractor" id="has_the_customer_chosen_a_contractor_02" value="No" >
                                        <label class="form-check-label" for="has_the_customer_chosen_a_contractor_02">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="job_number">If yes, what is the contractor's GMID?</label>
                                <input type="text" class="form-control" name="what_is_the_contractors_gmid">
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="form-group col">
                                <label for="job_number">Is Amber providing training and applications for the CT Scanner?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_amber_providing_training_and_applications_for_the_ct_scanner" id="is_amber_providing_training_and_applications_for_the_ct_scanner_01" value="Yes">
                                        <label class="form-check-label" for="is_amber_providing_training_and_applications_for_the_ct_scanner_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_amber_providing_training_and_applications_for_the_ct_scanner" id="is_amber_providing_training_and_applications_for_the_ct_scanner_02" value="No" >
                                        <label class="form-check-label" for="is_amber_providing_training_and_applications_for_the_ct_scanner_02">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="job_number">Will the images need to be directed to a specific PACS provider?</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="will_the_images_need_to_be_directed_to_a_specific_pacs" id="will_the_images_need_to_be_directed_to_a_specific_pacs_01" value="Yes" onchange="showHideYesNo(value, 'cutomer_it_person_contact_info')">
                                        <label class="form-check-label" for="will_the_images_need_to_be_directed_to_a_specific_pacs_01">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="will_the_images_need_to_be_directed_to_a_specific_pacs" id="will_the_images_need_to_be_directed_to_a_specific_pacs_02" value="No" onchange="showHideYesNo(value, 'cutomer_it_person_contact_info')">
                                        <label class="form-check-label" for="will_the_images_need_to_be_directed_to_a_specific_pacs_02">No</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <section id="cutomer_it_person_contact_info" style="display: none;">
                            <label for="job_number"><u>Customer's IT person contact information:</u></label>
                            <fieldset class="row">
                                <div class="form-group col">
                                    <label for="job_number">Complete Name:</label>
                                    <input type="text" class="form-control" name="customers_it_person_name">
                                </div>
                                <div class="form-group col">
                                    <label for="job_number">Phone number:</label>
                                    <input type="text" class="form-control" name="customers_it_person_phone_number">
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