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
                        <label for="job_number">Job Number:</label>
                        <input type="number" class="form-control" name="job_number">
                    </div>
                    <div class="form-group col">
                        <label for="job_type">Job Type:</label>
                        <select type="text" class="form-control" name="job_type">
                            <option value="">Select an option</option>
                            <option value="Wholesale">Wholesale</option>
                            <option value="Retail">Retail</option>
                            <option value="Inventory">Inventory</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="modality">Modality:</label>
                        <select type="text" class="form-control" name="modality" onchange="elementShowHideArray(value, 'C-ArmProductionInfo', 'X-raysProductionInfo')" >
                            <option value="">Select an option</option>
                            <option value="C-Arm">C-Arm</option>
                            <option value="X-Rays">X-Rays</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="equipment_manufacturer">Equipment Manufacturer:</label>
                        <input type="text" class="form-control" name="equipment_manufacturer">
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="equipment_model">Equipment Model:</label>
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
                                <input class="form-check-input" type="radio" name="equipment_requires_inspection" id="equipment_requires_inspection_1" value="Yes" onchange="elementShowHideYesNo(value, 'gmid_company_inspecting_equipment')">
                                <label class="form-check-label" for="equipment_requires_inspection_1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="equipment_requires_inspection" id="equipment_requires_inspection_2" value="No" onchange="elementShowHideYesNo(value, 'gmid_company_inspecting_equipment')">
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
            <!-- Form C-Arm PRODUCTION INFO Section -->
            <section id="C-ArmProductionInfo" style="display: none;">
                <hr>
                <h4 class="h4">Production Information (C-Arm)</h4>
            </section>
            <!-- Form X-Rays PRODUCTION INFO Section -->
            <section id="X-raysProductionInfo" style="display: none;">
                <hr>
                <h4 class="h4">Production Information (X-Rays)</h4>
            </section>
            <!-- Form SHIPPING INFO Section -->
            <section id="shippingInfo">
                <hr>
                <h4 class="h4">Shipping Information</h4>
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