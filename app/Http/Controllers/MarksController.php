<?php
  
namespace App\Http\Controllers;
  
use App\Student;
use App\Teacher;
use App\Gender;
use App\Mark;
use App\Term;
use Illuminate\Http\Request;
  
class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::with('student')->get();
       
       
        return view('marks.index',compact('marks'));
            
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = Term::latest()->get();
      
        $students = Student::latest()->get();
      
        return view('marks.create',compact('terms','students'));
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
            'student' => 'required',
            'term' => 'required',
            'markmath' => 'required',
            'markscience' => 'required',
            'markshistory' => 'required',
            
            

        ]);
        $marks = new Mark;

        $marks->maths = $request->markmath;
        $marks->science = $request->markscience;
        $marks->history = $request->markshistory;
        $marks->term_id = $request->term;
        $marks->student_id = $request->student;
        $marks->save();
       
   
        return redirect()->route('marks.index')
                        ->with('success','marks added successfully.');
    }
   
   
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        $terms = Term::latest()->get();
       
      
        $students = Student::latest()->get();
        return view('marks.edit',compact('students','terms','mark'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'student' => 'required',
            'term' => 'required',
            'markmath' => 'required',
            'markscience' => 'required',
            'markshistory' => 'required',
            
            

        ]);
  
        $mark->update($request->all());
  
        return redirect()->route('marks.index')
                        ->with('success','marks updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $student)
    {
        $student->delete();
  
        return redirect()->route('marks.index')
                        ->with('success','marks deleted successfully');
    }
}