<?php
  
namespace App\Http\Controllers;
  
use App\Student;
use App\Teacher;
use App\Gender;
use Illuminate\Http\Request;
  
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()
        
        ->paginate(5);

       
     
  
        return view('students.index',compact('students'));
            
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::latest()->get();
        $genders = Gender::latest()->get();
       
      
        return view('students.create',compact('teachers','genders'));
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
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required',
            

        ]);
        $student = new Student;

        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->teacher = $request->teacher;
        $student->save();
       
   
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }
   
   
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $genders = Gender::latest()->get();
        $teachers = Teacher::latest()->get();
        return view('students.edit',compact('student','teachers','genders'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher' => 'required',
            

        ]);
  
        $student->update($request->all());
  
        return redirect()->route('students.index')
                        ->with('success','student updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
  
        return redirect()->route('students.index')
                        ->with('success','student deleted successfully');
    }
}