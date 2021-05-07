@extends('layout')

@section('content')

<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-sm">
    <thead>
      <tr>
        <td scope="col">Job Number:</td>
        <td scope="col">Job Type:</td>
        <td scope="col">Modality:</td>
        <td scope="col">Action</td>
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
<div>
@endsection