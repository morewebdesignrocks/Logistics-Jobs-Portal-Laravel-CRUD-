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
                <h3>Equipment Information</h3>
                <fieldset class="row">
                    <div class="form-group col">
                        <label for="job_number">Job Number:</label>
                        <input type="number" class="form-control" name="job_number"/>
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
                        <input type="text" class="form-control" name="equipment_manufacturer"/>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="modality">Equipment Model:</label>
                        <input type="text" class="form-control" name="equipment_model"/>
                        </select>
                    </div>
                </fieldset>
            </section>
            <fieldset class="row">
                <div class="form-group col">
                <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection