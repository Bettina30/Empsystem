@extends('layout')
@section('title','Add Employee')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Create Employee
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
                                <form method="post" action="{{url('employee')}}">
                                    @csrf
                                <table class="table table-bordered">
                                  <tr>
                                    <th>Name</th>
                                    <td>
                                        <input type="text" name="name" class="form-control" />
                                    </td>
                                  </tr>
                                  <tr>
                                   <th>Email</th>
                                    <td>
                                      <input type="email" name="email" class="form-control" />
                                          @error('email')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                     </td>
                                   </tr>

                                  <tr>
                                    <th>Phone</th>
                                    <td>
                                        <input type="text" name="phone" class="form-control" />
                                    </td>
                                  </tr>

                                  <tr>
                                    <th>Date Of Birth</th>
                                    <td>
                                        <input type="date" name="date_of_birth" class="form-control" />
                                    </td>
                                  </tr>

                                  <tr>
                                    <th>Address</th>
                                    <td>
                                        <input type="text" name="address" class="form-control" />
                                    </td>
                                  </tr>
                                  <table class="table table-bordered">
                                  <th style="text-align: center;">Previous Experience</th>
                                  <tr>
        
                               <th>Company Name</th>
                                <td>
                                           <input type="text" name="company_name[]" class="form-control" placeholder="Company Name" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Position</th>
                                           <td>
                                              <input type="text" name="position[]" class="form-control" placeholder="Position" required />
                                              </td>
                                    </tr>
                                   <tr>
                                             <th>Start Date</th>
                                             <td>
                                                  <input type="date" name="start_date[]" class="form-control" required />
                                             </td>
                                     </tr>
                                       <tr>
                                             <th>End Date</th>
                                            <td>
                                                <input type="date" name="end_date[]" class="form-control" required />
                                              </td>
                                      </tr>
    
                                      <tr>
                                       <td colspan="2">
                                         <button type="button" onclick="addExperience()">Add Experience</button>
                                        </td>
                                         </tr>
                                  </table>
                                   <div id="previous-experience"></div>

 <script>
    function addExperience() {
        var container = document.querySelector('#previous-experience');
        var experienceDiv = document.createElement('div');
        experienceDiv.className = 'experience';
        experienceDiv.innerHTML = `
        <tr>
        
        <th>Company Name</th>
         <td>
                    <input type="text" name="company_name[]" class="form-control" placeholder="Company Name" required />
                    </td>
            </tr>

            <tr>
                  <th>Position</th>
                    <td>
                       <input type="text" name="position[]" class="form-control" placeholder="Position" required />
                       </td>
             </tr>
            <tr>
                      <th>Start Date</th>
                      <td>
                           <input type="date" name="start_date[]" class="form-control" required />
                      </td>
              </tr>
                <tr>
                      <th>End Date</th>
                     <td>
                         <input type="date" name="end_date[]" class="form-control" required />
                       </td>
               </tr>
        `;
        container.appendChild(experienceDiv);
    }
</script>


                                  <table class="table table-bordered">
                                  <tr>
                                     <th style="text-align: center;">Education Qualification</th>
                                  </tr>
                                  <tr>
                                       <th>Degree</th>
                                          <td>
                                           <input type="text" name="degree[]" class="form-control" placeholder="Degree" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Institution</th>
                                           <td>
                                              <input type="text" name="institution[]" class="form-control" placeholder="institution" required />
                                              </td>
                                    </tr>
                                   <tr>
                                             <th>Graduation Date</th>
                                             <td>
                                                  <input type="date" name="graduation_date[]" class="form-control" required />
                                             </td>
                                     </tr>
                                   <tr>
                               <td colspan="2">
                                <button type="button" onclick="addEducation()">Add Education Qualification</button>
                                </td>
                                 </tr>
                              </table>
                             <div id="education-qualification"></div>
<script>
    function addEducation() {
        var container = document.querySelector('#education-qualification');
        var educationDiv = document.createElement('div');
        educationDiv.className = 'education';
        educationDiv.innerHTML = `
        <tr>
                                       <th>Degree</th>
                                          <td>
                                           <input type="text" name="degree[]" class="form-control" placeholder="Degree" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Institution</th>
                                           <td>
                                              <input type="text" name="institution[]" class="form-control" placeholder="institution" required />
                                              </td>
                                    </tr>
                                   <tr>
                                             <th>Graduation Date</th>
                                             <td>
                                                  <input type="date" name="graduation_date[]" class="form-control" required />
                                             </td>
                                     </tr>
        `;
        container.appendChild(educationDiv);
    }
</script>

                                     <!-- Family Member -->
                                <table class="table table-bordered">
                                <tr>
                                <th style="text-align: center;">Family Member</th>
                                  </tr>
                                   <tr>
                                       <th>Family Member Name</th>
                                          <td>
                                           <input type="text" name="famname[]" class="form-control" placeholder="Family Member Name" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Relationship</th>
                                           <td>
                                              <input type="text" name="relationship[]" class="form-control" placeholder="Relationship" required />
                                              </td>
                                    </tr>
                                <tr>
                                  <td colspan="2">
                                 <button type="button" onclick="addFamilyMember()">Add Family Member</button>
                                  </td>
                                 </tr>
                                </table>
                                 <div id="family-member"></div>
<script>
    function addFamilyMember() {
        var container = document.querySelector('#family-member');
        var familyMemberDiv = document.createElement('div');
        familyMemberDiv.className = 'family-member';
        familyMemberDiv.innerHTML = `
        <tr>
                                       <th>Family Member Name</th>
                                          <td>
                                           <input type="text" name="famname[]" class="form-control" placeholder="Family Member Name" required />
                                           </td>
                                   </tr>
        
                                   <tr>
                                         <th>Relationship</th>
                                           <td>
                                              <input type="text" name="relationship[]" class="form-control" placeholder="Relationship" required />
                                              </td>
                                    </tr>
        `;
        container.appendChild(familyMemberDiv);
    }
</script>

                                  <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                  </tr>    
                                </table>
                                </form>
                            </div>
                        </div>
                      
@endsection