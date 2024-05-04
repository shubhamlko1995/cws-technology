<?php

namespace App\Http\Controllers;

use App\Models\ApplicantDetails;
use Illuminate\Http\Request;

class ApplicantDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicantDetails = ApplicantDetails::all();
        return view ('applicant_details.index')->with('applicants', $applicantDetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applicant_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $input = $request->all();
        $applicantDetails = ApplicantDetails::create($input);
        return true;
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $applicantDetails = ApplicantDetails::find($id);
        return view('applicant_details.show')->with('applicants', $applicantDetails);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    { 
        $id = $request->id;
        $applicantDetails = ApplicantDetails::find($id);
        return view('applicant_details.edit')->with('applicants', $applicantDetails);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $applicantDetails = ApplicantDetails::find($id);
        $input = $request->all();
        $applicantDetails->update($input);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   
        $id = $request->id;
        ApplicantDetails::destroy($id);
        return redirect('applicant')->with('flash_message', 'Applicant Details deleted!'); 
    }
}
