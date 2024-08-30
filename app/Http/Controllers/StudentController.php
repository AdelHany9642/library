<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Student::class, 'student');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $students = Student::when(
            $value = $request->query('query'),
            fn ($query) => $query->where('name', 'like', "%$value%")
        )->paginate();

        return view('dashboard.students.list', compact('students'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('dashboard.students.show', compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
