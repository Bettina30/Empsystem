@extends('layout')
@section('title','Update Employee')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Update Employee
                                <a href="{{url('employee')}}" class="float-end btn btn-sm btn-success">View ALL</a>
                            </div>
                            <div class="card-body">

                            @if($errors->any())
                             @foreach($errors->all() as $error)
                              <p class="text-danger">{{$error}}</p>
                              @endforeach
                             @endif

                                @if(Session::has('msg'))
                                <p class="text-success">{{session('msg')}}</p>
                                @endif

                                <form method="post" action="{{url('employee/'.$data->id)}}">
                                  @method('put')
                                @csrf
                                <table class="table table-bordered">
                                <tr>
    <th>Name</th>
    <td>
        <input type="text" value="{{$data->name}}" name="name" class="form-control" />
    </td>
</tr>

<tr>
    <th>Email</th>
    <td>
        <input type="email" value="{{$data->email}}" name="email" class="form-control" />
    </td>
</tr>

<tr>
    <th>Phone</th>
    <td>
        <input type="text" value="{{$data->phone}}" name="phone" class="form-control" />
    </td>
</tr>

<tr>
    <th>Date Of Birth</th>
    <td>
        <input type="date" value="{{$data->date_of_birth}}" name="date_of_birth" class="form-control" />
    </td>
</tr>

<tr>
    <th>Address</th>
    <td>
        <input type="text" value="{{$data->address}}" name="address" class="form-control" />
    </td>
</tr>
@foreach($data->previousExperience as $experience)
<tr>
    <th>Company Name</th>
    <td>
        <input type="text" value="{{$experience->company_name}}" name="company_name[]" class="form-control" placeholder="Company Name" required />
    </td>
</tr>

<tr>
    <th>Position</th>
    <td>
        <input type="text" value="{{ $experience->position}}" name="position[]" class="form-control" placeholder="Position" required />
    </td>
</tr>

<tr>
    <th>Start Date</th>
    <td>
        <input type="date" value="{{$experience->start_date}}" name="start_date[]" class="form-control" required />
    </td>
</tr>

<tr>
    <th>End Date</th>
    <td>
        <input type="date" value="{{ $experience->end_date}}" name="end_date[]" class="form-control" required />
    </td>
</tr>
@endforeach

@foreach($data->educationQualifications as $education)
                                    <tr>
                                       <th>Degree</th>
                                          <td>
                                           <input type="text" value="{{$education->degree}}" name="degree[]" class="form-control" placeholder="Degree" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Institution</th>
                                           <td>
                                              <input type="text" value="{{$education->institution}}" name="institution[]" class="form-control" placeholder="institution" required />
                                              </td>
                                    </tr>
                                   <tr>
                                             <th>Graduation Date</th>
                                             <td>
                                                  <input type="date" value="{{ $education->graduation_date}}" name="graduation_date[]" class="form-control" required />
                                             </td>
                                     </tr>
                                     @endforeach

                                 @foreach($data->familyMembers as $member)                              
<tr>
    <th>Family Member Name</th>
    <td>
        <input type="text" value="{{$member->famname}}" name="family_member_name[]" class="form-control" placeholder="Family Member Name" required />
    </td>
</tr>

<tr>
    <th>Relationship</th>
    <td>
        <input type="text" value="{{ $member->relationship}}" name="relationship[]" class="form-control" placeholder="Relationship" required />
    </td>
</tr>
@endforeach
                                  <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                  </tr>
                        
                                </table>
                                </form>
                            </div>
                        </div>



                        
@endsection