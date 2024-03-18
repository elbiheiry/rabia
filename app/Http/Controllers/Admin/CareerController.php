<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    //
    public function getIndex()
    {
        $candidates = Candidate::all();

        return view('admin.pages.candidates.index', compact('candidates'));
    }

    public function getDelete($id)
    {
        $candidate = Candidate::find($id);

        $candidate->delete();

        return redirect()->back();
    }
}
