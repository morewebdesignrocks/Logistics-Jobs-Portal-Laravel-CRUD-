@extends('layout')

@section('content')
<div class="card bg-light">
  <div class="card-header">
      <h1>Jobs List</h1>
  </div>
  <div class="card-body">
    <div class="mt-0">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
      <table class="table table-sm">
        <thead class="thead">
          <tr>
            <td scope="col"><b>Job Number:</b></td>
            <td scope="col"><b>Job Type:</b></td>
            <td scope="col"><b>Modality:</b></td>
            <td scope="col"><b>Action</b></td>
          </tr>
        </thead>
        <tbody>
          @foreach($job as $job)
          <tr>
            <th scope="row">{{$job->job_number}}</th>
            <td>{{$job->job_type}}</td>
            <td>{{$job->modality}}</td>
            <td>
                <a href="{{ route('jobs.edit', $job->id)}}" class="btn btn-success btn-sm">Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection