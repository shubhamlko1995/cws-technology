<?php

namespace App\Http\Controllers;


use App\Models\ApplicantDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $applicantDetails = ApplicantDetails::all();
        return view ('applicant_details.index')->with('applicants', $applicantDetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('applicant_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {   dd($request->all());
        $input = $request->all();
        $applicantDetails = ApplicantDetails::create($input);
        return redirect('applicant')->with('flash_message', 'Applicant Details Addedd!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $applicantDetails = ApplicantDetails::find($id);
        return view('applicant_details.show')->with('applicants', $applicantDetails);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $applicantDetails = ApplicantDetails::find($id);
        return view('applicant_details.edit')->with('applicants', $applicantDetails);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $applicantDetails = ApplicantDetails::find($id);
        $input = $request->all();
        $applicantDetails->update($input);
        return redirect('applicant')->with('flash_message', 'Applicant Details Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        ApplicantDetails::destroy($id);
        return redirect('applicant')->with('flash_message', 'Applicant Details deleted!'); 
    }
}
