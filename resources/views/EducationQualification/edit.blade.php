@extends('layout')
@section('title','Update Details')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Update details 
                                <a href="{{url('EducationQualification')}}" class="float-end btn btn-sm btn-success">View ALL</a>
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

                                <form method="post" action="{{url('EducationQualification/'.$data->id)}}">
                                  @method('put')
                                @csrf
                                <table class="table table-bordered">
                            

                                  <tr>
                                    <th>degree</th>
                                    <td>
                                        <input type="text" value="{{$data->degree}}" name="degree" class="form-control" />
                                    </td>

                                  </tr>

                                  <tr>
                                    <th>institution</th>
                                    <td>
                                        <input type="text" value="{{$data->institution}}" name="institution" class="form-control" />
                                    </td>

                                  </tr>

                                  <tr>
                                    <th>graduation_date</th>
                                    <td>
                                        <input type="date" value="{{$data->graduation_date}}" name="graduation_date" class="form-control" />
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