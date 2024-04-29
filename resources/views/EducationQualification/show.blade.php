@extends('layout')
@section('title','View EducationQualification')
@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                View EducationQualification
                                <a href="{{url('EducationQualification')}}" class="float-end btn btn-sm btn-success">View ALL</a>
                            </div>
                            <div class="card-body">
         
                                <table class="table table-bordered">
                                <tr>
                                     <th>Degree</th>
                                     <td>{{ $data->degree }}</td>
                                  </tr>
                                  <tr>
                                     <th>Institution</th>
                                     <td>{{ $data->institution }}</td>
                                  </tr>
                                  <tr>
                                       <th>Graduation Date</th>
                                        <td>{{ $data->graduation_date }}</td>
                                  </tr>
                                      
                                    
                                </table>
                               
                            </div>
                        </div>
                     




                        
@endsection