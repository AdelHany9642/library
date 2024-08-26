<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $students = Student::all();
        return view('dashboard.students.list', compact('students'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $student = Student::findOrFail($id);
        return view('dashboard.students.show', compact('student'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Student::destroy($id);
        return redirect('/students');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Attempt to find the student by ID first
        $student = Student::findOrFail($query);

        if ($student) {
            return redirect()->route('students.show', $student->id);
        } else {
            // Optionally handle case where no student is found
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
    }
}
