<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $studenti = Student::all();
         return view('students.index', compact('studenti'));
         // return view('students.index', ['studenti' => $studenti]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('students.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         // nome 255 caratteri non piu grande,massima lunghezza e fare un require
         // verifico che il prezzo sia un numero e non sia negativo
         $request->validate([
             'name'=> 'required|max:255',
             'lastname'=> 'required|max:255',
             'matricola'=> 'required|max:20',
             'email'=> 'required|max:30'
         ]);
         $dati = $request->all();
         $nuovo_studente = new Student();
         $nuovo_studente->fill($dati);
         $nuovo_studente->save();
         return redirect()->route('students.index');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Student $student)
     {
         // $student = Student::find($id);
         return view('students.show', compact('student'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        if($student) {
            return view('students.edit', compact('student'));
        }
        return abort('404');
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
            'name'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'matricola'=> 'required|max:20',
            'email'=> 'required|max:30'
        ]);
        $dati = $request->all();
        $student = Student::find($id);
        if($student) {
            $student->update($dati);
        }
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student) {
            $student->delete();
        }
        return redirect()->route('students.index');
    }
}
