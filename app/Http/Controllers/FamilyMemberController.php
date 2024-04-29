<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
use App\Models\Employee;
use League\CommonMark\Extension\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FamilyMember::with('employee')->get();
    return view('FamilyMember.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('FamilyMember.create', compact('employees'));
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
            'famname'=>'required|string',
            'relationship'=>'required|string',
             
        ]);
         // Create a new education qualification record
         $data = new FamilyMember($validatedData);
    
         // Save the record to the database
         $data->save();
         return redirect('FamilyMember/create')->with('msg','Data has been submitted');;
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=FamilyMember::find($id);
        return view('FamilyMember.show',['data'=>$data]);
        $employee = FamilyMember::find($id);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=FamilyMember::find($id);
        return view('FamilyMember.edit',['data'=>$data]);
    
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
            'famname'=>'required',
            'relationship'=>'required',
        ]);

        $data=FamilyMember::find($id);
        $data->famname=$request->famname;
        $data->relationship=$request->relationship;
        $data->save();

        return redirect('FamilyMember/'.$id.'/edit')->with('msg','Data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FamilyMember::where('id',$id)->delete();
        return redirect('FamilyMember');
    }
}
