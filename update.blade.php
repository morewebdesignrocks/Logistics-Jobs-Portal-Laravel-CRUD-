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
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="job-number">Job Number:</label>
                <input type="number" class="form-control" name="job-number" value="{{ $job->job_number }}" />
            </div>
            <div class="form-group">
                <label for="job-type">Job Type:</label>
                <input type="text" class="form-control" name="job-type" value="{{ $job->job_type }}" />
            </div>
            <div class="form-group">
                <label for="modality">Phone</label>
                <input type="text" class="form-control" name="modality" value="{{ $job->modality }}" />
            </div>

            <button type="submit" class="btn btn-block btn-danger">Update</button>
        </form>
    </div>
</div>
@endsection