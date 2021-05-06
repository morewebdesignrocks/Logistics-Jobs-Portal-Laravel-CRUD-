@extends('layout')

@section('content')

<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td># ID</td>
          <td>Job Number:</td>
          <td>Job Type:</td>
          <td>Modality:</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($job as $job)
        <tr>
            <td>{{$job->id}}</td>
            <td>{{$job->job_number}}</td>
            <td>{{$job->job_type}}</td>
            <td>{{$job->modality}}</td>
            <td class="text-center">
                <a href="{{ route('jobs.edit', $job->id)}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('jobs.destroy', $job->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection