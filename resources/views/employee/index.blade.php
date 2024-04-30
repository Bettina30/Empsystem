@extends('layout')
@section('title','All Employee')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                ALL Employee
                                <a href="{{url('employee/create')}}" class="float-end btn btn-sm btn-success">Add New</a>
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date Of Birth</th>
            <th>Address</th>
           
 <!-- Add header for previous experience -->
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date Of Birth</th>
            <th>Address</th>
        
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        @if($data)
            @foreach($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->phone }}</td>
                    <td>{{ $d->date_of_birth }}</td>
                    <td>{{ $d->address }}</td>
                    
                    <!-- Displaying previous experience -->
                    <!--
                    <td>
                        @foreach ($d->previousExperience as $experience)
                            <div>
                                <strong>Company:</strong> {{ $experience->company_name }}<br>
                                <strong>Position:</strong> {{ $experience->position }}<br>
                                <strong>Start Date:</strong> {{ $experience->start_date }}<br>
                                <strong>End Date:</strong> {{ $experience->end_date }}<br>
                                <hr>
                            </div>
                        @endforeach
                    </td>
-->
                      <!-- Displaying educationQualification -->
                      <!--
                      <td>
                        @foreach ($d->educationQualifications as $qualification)
                            <div>
                                <strong>Degree:</strong> {{  $qualification->degree }}<br>
                                <strong>Institution:</strong> {{  $qualification->institution }}<br>
                                <strong>Graduation Date:</strong> {{  $qualification->graduation_date }}<br>
                                <hr>
                            </div>
                        @endforeach
                    </td>
-->
                      <!-- Displaying familyMember -->
                      <!--
                  <td>
                        @foreach ($d->familyMembers as $member)
                            <div>
                                <strong>Name:</strong> {{ $member->famname }}<br>
                                <strong>Relationship:</strong> {{ $member->relationship }}<br>
                                <hr>
                            </div>
                        @endforeach
                    </td>
-->
                    <!-- Action buttons -->
                    <td>
                        <a href="{{ url('employee/' . $d->id) }}" class="btn btn-warning btn-sm">Show</a>
                        <a href="{{ url('employee/' . $d->id . '/edit') }}" class="btn btn-info btn-sm">Update</a>
                        <a onclick="return confirm('Are You sure')" href="{{ url('employee/' . $d->id . '/delete') }}" class="btn btn-danger btn-sm">Delete</a>
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