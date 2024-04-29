@extends('layout')
@section('title','Details of  Employee')
@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Details of  Employee
                                <a href="{{url('employee')}}" class="float-end btn btn-sm btn-success">View ALL</a>
                            </div>
                            <div class="card-body">
         
                            <table class="table table-bordered">
                            <tr>
                               <th>Name</th>
                                 <td>{{ $data->name }}</td>
                                 </tr>
                             <tr>
                                 <th>Email</th>
                                 <td>{{ $data->email }}</td>
                            </tr>
                             <tr>
                                 <th>Phone</th>
                                  <td>{{ $data->phone }}</td>
                             </tr>
                             <tr>
                                 <th>Date Of Birth</th>
                                  <td>{{ $data->date_of_birth }}</td>
                              </tr>
                              <tr>
                               <th>Address</th>
                               <td>{{ $data->address }}</td>
                               </tr>

                               <!-- Previous Experience -->
                               @foreach($data->previousExperience as $experience)
                              <tr>
                                 <th>Company Name</th>
                                     <td>{{ $experience->company_name }}</td>
                              </tr>
                              <tr>
                                   <th>Position</th>
                                   <td>{{ $experience->position }}</td>
                              </tr>
                               <tr>
                                    <th>Start Date</th>
                                    <td>{{ $experience->start_date }}</td>
                                       </tr>
                                      <tr>
                                    <th>End Date</th>
                                     <td>{{ $experience->end_date }}</td>
                                     </tr>
                                  @endforeach

                                <!-- Education Qualifications -->
                                @foreach($data->educationQualifications as $education)
                                  <tr>
                                     <th>Degree</th>
                                     <td>{{ $education->degree }}</td>
                                  </tr>
                                  <tr>
                                     <th>Institution</th>
                                     <td>{{ $education->institution }}</td>
                                  </tr>
                                  <tr>
                                       <th>Graduation Date</th>
                                        <td>{{ $education->graduation_date }}</td>
                                  </tr>
                                @endforeach

                                  <!-- Family Members -->
                                @foreach($data->familyMembers as $member)
                                <tr>
                                <th>Family Member Name</th>
                                <td>{{ $member->famname }}</td>
                           </tr>
                            <tr>
                                  <th>Relationship</th>
                                  <td>{{ $member->relationship }}</td>
                             </tr>
                             @endforeach
    
                            </table>
                               
                            </div>
                        </div>
                     




                        
@endsection