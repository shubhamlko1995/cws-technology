@extends('applicant_details.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Applicant Registration Form</div>
  <div class="card-body">
      
      <form id="applicantDetails" enctype="multipart/form-data">
        @csrf
        <label>First Name:-</label></br>
        <input type="text" name="first_name" id="firstname" class="form-control"></br>
        <label>Last Name:-</label></br>
        <input type="text" name="last_name" id="lastname" class="form-control"></br>
        <label>Mobile:-</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10"></br>
        <label>Email:-</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Address:-</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Date of Birth:-</label></br>
        <input type="date" name="dob" id="dob" class="form-control"></br>
        <label>Gender:-</label></br>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="male" name="gender" value="Male">Male
          <label class="form-check-label" for="male"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="female" name="gender" value="Female">Female
          <label class="form-check-label" for="female"></label>
        </div>
        <label>Upload Resume:-</label></br>
        <input type="file" name="resume_path" id="resume_path" class="form-control"></br>
        <label>Upload Photo:-</label></br>
        <input type="file" name="photo_path" id="photo_path" class="form-control"></br>
    
        <input type="submit" value="Save" id="finalsubmit" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#finalsubmit").on('click', function(e){
    e.preventDefault();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var dob = $('#dob').val();
    var regexemail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var numberRegex = /^\d+$/;
    var resume = $("input[name=resume_path]").prop('files')[0]??'';
    var photo = $("input[name=photo_path]").prop('files')[0]??'';
    let type_file_resume = typeof resume;
    let type_file_photo = typeof photo;
    
    let ext_resume = $('#resume_path').val().split('.').pop().toLowerCase();
    let ext_photo = $('#photo_path').val().split('.').pop().toLowerCase();
    let resumeSize = resume.size / 1024 / 1024;
    let photoSize = photo.size / 1024 / 1024;

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
    } else if (type_file_resume == 'string'){
      alert("Please upload resume");
      return false;
    } else if (type_file_photo == 'string'){
      alert("Please upload photo");
      return false;
    } else if ($.inArray(ext_resume, ['txt', 'pdf']) == -1){
      alert("Only txt and PDF formats allowed in Resume");
      return false;
    } else if ($.inArray(ext_photo, ['png', 'jpg']) == -1){
      alert("Only PNG,JPG formats allowed in Photo");
      return false;
    } else if (resumeSize > 2) {
      alert("2 MB File size is allowed");
      return false;
    } else if (photoSize > 2) {
      alert("2 MB File size is allowed");
      return false;
    } else {
      var formData = $('#applicantDetails').serialize();
      
        $.ajax({
            type:'POST',
            url:"{{ url('saveApplicantData') }}",
            data:formData,
            // async: false,
            // cache: false,
            // contentType: false,
            // processData: false,
            success:function(resp){
               alert("Applicant Data Inserted Successfully");
               window.location.href = "{{ url('/applicant') }}";
            },
            error:function(error){

            }
            
        });
        
    }
  });
});
</script>

