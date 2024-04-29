@extends('layout')
@section('title','PreviousExperience')
@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                View PreviousExperience
                                <a href="{{url('PreviousExperience')}}" class="float-end btn btn-sm btn-success">View ALL</a>
                            </div>
                            <div class="card-body">
         
                            <table class="table table-bordered">
    <tr>
        <th>Company Name</th>
        <td>{{ $data->company_name }}</td>
    </tr>
    <tr>
        <th>Position</th>
        <td>{{ $data->position }}</td>
    </tr>
    <tr>
        <th>Start Date</th>
        <td>{{ $data->start_date }}</td>
    </tr>
    <tr>
        <th>End Date</th>
        <td>{{ $data->end_date }}</td>
    </tr>
</table>
                               
                            </div>
                        </div>
                     




                        
@endsection