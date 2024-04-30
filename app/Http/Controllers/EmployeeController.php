<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PreviousExperience;
use App\Models\EducationQualification;
use App\Models\FamilyMember;
use League\CommonMark\Extension\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    
     $data = Employee::with(['previousExperience','educationQualifications', 'familyMembers'])->get();
   

    // Return the view with the data
    return view('employee.index', compact('data'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('employee.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'required',
        'date_of_birth' => 'required',
        'address' => 'required',
       // 'company_name' => 'required', // Validate each item in the array
      //  'position' => 'required',
      //  'start_date' => 'required',
       // 'end_date' => 'required', // Validate that end date is after start date
       // 'degree' => 'required', // Validate each item in the array
       // 'institution' => 'required',
        //'graduation_date' => 'required',
        //'famname' => 'required', // Validate each item in the array
        //'relationship' => 'required',
    ]);

    $data = new Employee();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->date_of_birth = $request->date_of_birth;
    $data->address = $request->address;
    $data->save();

    // Process Previous Experience
    if ($request->has('company_name')) {
        foreach ($request->company_name as $key => $value) {
            $previousExperience = new PreviousExperience();
            $previousExperience->company_name = $request->company_name[$key];
            $previousExperience->position = $request->position[$key];
            $previousExperience->start_date= $request->start_date[$key];
            $previousExperience->end_date = $request->end_date[$key];
            $data->previousExperience()->save($previousExperience);
        }
    }

    if ($request->has('degree')) {
        foreach ($request->degree as $key => $value) {
            $educationQualification = new EducationQualification();
            $educationQualification->degree = $request->degree[$key];
            $educationQualification->institution = $request->institution[$key];
            $educationQualification->graduation_date = $request->graduation_date[$key];
            $data->educationQualifications()->save($educationQualification);
        }
    }
    
    // Process Family Members
    if ($request->has('famname')) {
        foreach ($request->famname as $key => $value) {
            $familyMember = new FamilyMember();
            $familyMember->famname = $request->famname[$key];
            $familyMember->relationship = $request->relationship[$key];
            $data->familyMembers()->save($familyMember);
        }
    }

    return redirect('employee/create')->with('msg', 'Data has been submitted');
}

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Employee::find($id);
        return view('employee.show',['data'=>$data]);

        $employee = Employee::find($id);
    
    
    
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Employee::find($id);
        return view('employee.edit',['data'=>$data]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'address'=>'required',
             'company_name' => 'required', // Validate each item in the array
        'position' => 'required',
        'start_date' => 'required',
        'end_date' => 'required', // Validate that end date is after start date
        'degree' => 'required', // Validate each item in the array
        'institution' => 'required',
        'graduation_date' => 'required',
        'famname' => 'required', // Validate each item in the array
        'relationship' => 'required',
    ]);

    $data = new Employee();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->date_of_birth = $request->date_of_birth;
    $data->address = $request->address;
    $data->save();

    // Process Previous Experience
    if ($request->has('company_name')) {
        foreach ($request->company_name as $key => $value) {
            $previousExperience = new PreviousExperience();
            $previousExperience->company_name = $request->company_name[$key];
            $previousExperience->position = $request->position[$key];
            $previousExperience->start_date= $request->start_date[$key];
            $previousExperience->end_date = $request->end_date[$key];
            $data->previousExperience()->save($previousExperience);
        }
    }

    if ($request->has('degree')) {
        foreach ($request->degree as $key => $value) {
            $educationQualification = new EducationQualification();
            $educationQualification->degree = $request->degree[$key];
            $educationQualification->institution = $request->institution[$key];
            $educationQualification->graduation_date = $request->graduation_date[$key];
            $data->educationQualifications()->save($educationQualification);
        }
    }
    
    // Process Family Members
    if ($request->has('famname')) {
        foreach ($request->famname as $key => $value) {
            $familyMember = new FamilyMember();
            $familyMember->famname = $request->famname[$key];
            $familyMember->relationship = $request->relationship[$key];
            $data->familyMembers()->save($familyMember);
        }
    }

        return redirect('employee/'.$id.'/edit')->with('msg','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        return redirect('employee');
    }
}
