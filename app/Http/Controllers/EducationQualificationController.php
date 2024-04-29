<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EducationQualification;
use League\CommonMark\Extension\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;

class EducationQualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =EducationQualification::with('employee')->get();
        return view('EducationQualification.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('EducationQualification.create', compact('employees'));
        //return view('EducationQualification.create');
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
            'employee_id' => 'required|exists:employees,id',
            'degree'=>'required',
            'institution'=>'required',
            'graduation_date'=>'required', 
        ]);

        $data=new EducationQualification();
        $data->employee_id = $request->employee_id;
        $data->degree=$request->degree;
        $data->institution=$request->institution;
        $data->graduation_date=$request->graduation_date;
        $data->save();
        return redirect('EducationQualification/create')->with('msg','Data has been submitted');
        
    }
    
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=EducationQualification::find($id);
        return view('EducationQualification.show',['data'=>$data]);
        $employee = EducationQualification::find($id);
        $employees = Employee::all();
    
    
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=EducationQualification::find($id);
        return view('EducationQualification.edit',['data'=>$data]);
    
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
            'degree'=>'required',
            'institution'=>'required',
            'graduation_date'=>'required',
        ]);

        $data=EducationQualification::find($id);
        $data->degree=$request->degree;
        $data->institution=$request->institution;
        $data->graduation_date=$request->graduation_date;
        $data->save();

        return redirect('EducationQualification/'.$id.'/edit')->with('msg','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EducationQualification::where('id',$id)->delete();
        return redirect('EducationQualification');
    }
}
