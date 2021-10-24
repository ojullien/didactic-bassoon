<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        // Get all departments and send to view
        $departments = Departments::all();
        return \view('departments', \compact('departments'));
    }
}
