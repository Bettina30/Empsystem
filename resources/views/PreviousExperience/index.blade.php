@extends('layout')
@section('title','Details')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                PreviousExperience
                                <a href="{{url('PreviousExperience/create')}}" class="float-end btn btn-sm btn-success">Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th> 
                                            <th>Employee Name</th>
                                             <th>Company Name</th>
                                             <th>Position</th>
                                             <th>Start Date</th>
                                             <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->employee->name}}</td>
                                            <td>{{$d->company_name}}</td>
                                            <td>{{$d->position}}</td>
                                            <td>{{$d->start_date}}</td>
                                            <td>{{$d->end_date}}</td>
 
                                            <td>
                                                <a href="{{url('PreviousExperience/'.$d->id)}}" class="btn btn-warning btn-sm">Show</a>
                                                <a href="{{url('PreviousExperience/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                                                <a onclick="return confirm('Are You sure')" href="{{url('PreviousExperience/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/datatables-simple-demo.js"></script>

@endsection