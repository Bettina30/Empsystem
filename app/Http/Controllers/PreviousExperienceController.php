<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreviousExperience;
use App\Models\Employee;
use League\CommonMark\Extension\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;

class PreviousExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PreviousExperience::with('employee')->get();
    return view('PreviousExperience.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('PreviousExperience.create', compact('employees'));
        //return view('FamilyMember.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'company_name'=>'required|string',
            'position'=>'required|string',
            'start_date'=>'required|string',
            'end_date'=>'required|string',
             
        ]);
         // Create a new education qualification record
         $data = new PreviousExperience($validatedData);
    
         // Save the record to the database
         $data->save();
         return redirect('PreviousExperience/create')->with('msg','Data has been submitted');;
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=PreviousExperience::find($id);
        return view('PreviousExperience.show',['data'=>$data]);
        $employee = PreviousExperience::find($id);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=PreviousExperience::find($id);
        return view('PreviousExperience.edit',['data'=>$data]);
    
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
            'company_name'=>'required|string',
            'position'=>'required|string',
            'start_date'=>'required|string',
            'end_date'=>'required|string',
        ]);

        $data=PreviousExperience::find($id);
        $data->company_name=$request->company_name;
        $data->position=$request->position;
        $data->start_date=$request->start_date;
        $data->start_date=$request->start_date;
        $data->save();

        return redirect('PreviousExperience/'.$id.'/edit')->with('msg','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PreviousExperience::where('id',$id)->delete();
        return redirect('PreviousExperience');
    }
}
