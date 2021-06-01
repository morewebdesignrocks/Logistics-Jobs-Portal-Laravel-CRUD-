@extends('layout')

@section('content')
<div class="card bg-light">
  <div class="card-header">
      <h1>Jobs Search Results</h1>
  </div>
  <div class="card-body">
    <div class="mt-0">
      <!-- Search field -->
        <section class="mb-4">
            <form action="{{ route('jobs.search') }}" method="GET" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <label for="job_number">Search job number:</label>
                    <input type="text" class="form-control" name="search" placeholder="Search job number">
                    <button class="btn btn-default" type="submit">
                        <span class=""><i class="fas fa-search"></i></span>
                    </button>
                </div>
            </form>
        </section>  
      <!-- Jobs Listing -->
      <section>
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
                <?php
                    $job = "This is a job";
                ?>

            <h1>Update Job: {{ $job }}</h1>
<!--
                @if( { $job ?? '' } -> isNotEmpty() )
                    @foreach ($job as $job)
                    <tr>    
                        <td>{{ $job->job_type }}</td>
                    </tr>
                    @endforeach
                @else 
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
-->

<!--
                @foreach($job as $job)
                <tr>
                    <th scope="row">{{$job ?? ''->job_number}}</th>
                    <td>{{$job ?? ''->job_type}}</td>
                    <td>{{$job ?? ''->modality}}</td>
                
                    <td>
                        <a href="{{ route('jobs.edit', $job ?? ''->id)}}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
-->
        </table>
      </section>
    </div>
  </div>
</div>
@endsection