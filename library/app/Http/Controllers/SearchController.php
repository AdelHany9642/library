<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $id = request('query');

        $student = Student::where('id', $id)->first();

        return view('components.results', ['student' => $student]);
    }
}
