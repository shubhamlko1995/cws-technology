@extends('applicant_details.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Applicant Registration Form Page</div>
  <div class="card-body">
      
      <form id="applicantDetailsEdit" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="{{$applicants->id}}" id="id" />
        <label>First Name</label></br>
        <input type="text" name="first_name" id="first_name" value="{{$applicants->first_name}}" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="last_name" id="last_name" value="{{$applicants->last_name}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$applicants->mobile}}" class="form-control" maxlength="10"></br>
        <label>Email:-</label></br>
        <input type="text" name="email" id="email" value="{{$applicants->email}}"  class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$applicants->address}}" class="form-control"></br>
        <label>Date of Birth:-</label></br>
        <input type="date" name="dob" id="dob" value="{{$applicants->dob}}" class="form-control"></br>
        <label>Gender:-</label></br>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="male" name="gender" value="Male" checked>Male
          <label class="form-check-label" for="male"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="female" name="gender" value="Female">Female
          <label class="form-check-label" for="female"></label>
        </div>

        <input type="submit" value="Update" id="updateDetails" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#updateDetails").on('click', function(e){
    e.preventDefault();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var dob = $('#dob').val();
    var regexemail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var numberRegex = /^\d+$/;
   

    if(firstname ==""){
      alert("Please enter first name");
      return false;
    } else if (lastname ==""){
      alert("Please enter last name");
      return false;
    } else if (mobile ==""){
      alert("Please enter Mobile Number");
      return false;
    } else if (!numberRegex.test(mobile)){
      alert("Please enter Valid Mobile Number");
      return false;
    } else if (mobile.length < 10){
      alert("Please enter 10 digit Mobile Number");
      return false;
    } else if (email ==""){
      alert("Please enter Email");
      return false;
    } else if (!regexemail.test(email)){
      alert("Please enter Valid Email ID");
      return false;
    } else if (address ==""){
      alert("Please enter Address");
      return false;
    } else if (dob ==""){
      alert("Please enter Date of Birth");
      return false;
    } else if ($('input[name=gender]:checked').length == 0){
      alert("Please select gender");
      return false;  
    } else {
      var formData = $('#applicantDetailsEdit').serialize();
      
        $.ajax({
            type:'POST',
            url:"{{ url('updateApplicantData') }}",
            data:formData,
            // async: false,
            // cache: false,
            // contentType: false,
            // processData: false,
            success:function(resp){
               alert("Applicant Data Updated Successfully");
               window.location.href = "{{ url('/applicant') }}";
            },
            error:function(error){

            }
            
        });
        
    }
  });
});
</script>

