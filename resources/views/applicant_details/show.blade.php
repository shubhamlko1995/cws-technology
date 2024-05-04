@extends('applicant_details.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Applicant Detail Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $applicants->first_name }} {{ $applicants->last_name }}</h5>
        <p class="card-text">Mobile : {{ $applicants->mobile }}</p>
        <p class="card-text">Email : {{ $applicants->email }}</p>
        <p class="card-text">Address : {{ $applicants->address }}</p>
        <p class="card-text">Mobile : {{ $applicants->mobile }}</p>
        <p class="card-text">DOB : {{ $applicants->dob }}</p>
        <p class="card-text">Gender : {{ $applicants->gender }}</p>                                
  </div>
       
    </hr>
  
  </div>
</div>