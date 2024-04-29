@extends('layout')
@section('title','View FamilyMember')
@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                View FamilyMember
                                <a href="{{url('FamilyMember')}}" class="float-end btn btn-sm btn-success">View ALL</a>
                            </div>
                            <div class="card-body">
         
                                <table class="table table-bordered">
                                <tr>
                                <th>Family Member Name</th>
                                <td>{{ $data->famname }}</td>
                           </tr>
                            <tr>
                                  <th>Relationship</th>
                                  <td>{{ $data->relationship }}</td>
                             </tr>
                                </table>
                            </div>
                        </div>
                     




                        
@endsection