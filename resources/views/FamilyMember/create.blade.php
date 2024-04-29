@extends('layout')
@section('title','Add Details')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Add Details
                                <a href="{{url('FamilyMember')}}" class="float-end btn btn-sm btn-success">View ALL</a>
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
                                <form method="post" action="{{url('FamilyMember')}}">
                                    @csrf
                                <table class="table table-bordered">
                               
                                <tr>
            <th>Employee</th>
            <td>
                <select name="employee_id" class="form-control">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>

                                <tr>
                                    <th>Family Member Name</th>
                                    <td>
                                        <input type="text" name="famname" class="form-control" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Relationship</th>
                                    <td>
                                        <input type="text" name="relationship" class="form-control" />
                                    </td>
                                  </tr>                              
                                  <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                  </tr>
                                </table>
                                </form>
                            </div>
                        </div>



                        
@endsection