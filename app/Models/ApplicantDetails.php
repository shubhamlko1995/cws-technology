<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantDetails extends Model
{
    use HasFactory;
    protected $table = 'applicant_details';

    protected $fillable = ['first_name', 'last_name', 'mobile','email','address','dob','gender','resume_path','photo_path'];
}
