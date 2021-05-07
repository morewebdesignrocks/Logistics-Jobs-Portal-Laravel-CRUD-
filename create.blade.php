@extends('layout')

@section('content')

<div class="card mt-5">
    <div class="card-header">
        Add New Job
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
            <section class="">
                <h4 class="h4">Equipment Information</h4>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="job_number">Job Number:</label>
                        <input type="number" class="form-control" name="job_number">
                    </div>
                    <div class="form-group col">
                        <label for="job_type">Job Type:</label>
                        <select type="text" class="form-control" name="job_type">
                            <option value="Wholesale">Wholesale</option>
                            <option value="Retail">Retail</option>
                            <option value="Inventory">Inventory</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="modality">Modality:</label>
                        <select type="text" class="form-control" name="modality">
                            <option value="C-Arm">C-Arm</option>
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
            <section class="">
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
                                <input type="radio" class="form-check-input" name="equipment_requires_inspection" value="Yes">
                                <label for="equipment_requires_inspection">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="equipment_requires_inspection" value="No">
                                <label for="equipment_requires_inspection">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="gmid_company_inspecting_equipment">GMID of company inspecting the equipment:</label>
                        <input type="text" class="form-control" name="gmid_company_inspecting_equipment">
                        </select>
                    </div>
                </fieldset>
            </section>
            <fieldset class="row">
                <div class="form-group col">
                <button type="submit" class="btn btn-primary">Add Job</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection