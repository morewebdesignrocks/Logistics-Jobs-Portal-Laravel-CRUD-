@extends('layout')

@section('content')

<div class="card mt-5">
  <div class="card-header">
    Create New Job
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
          <div class="form-group">
              @csrf
              <label for="job_number">Job #:</label>
              <input type="number" class="form-control" name="job_number"/>
          </div>
          <div class="form-group">
              <label for="job_type">Job Type</label>
              <input type="text" class="form-control" name="job_type"/>
          </div>
          <div class="form-group">
              <label for="modality">Modality</label>
              <input type="text" class="form-control" name="modality"/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection