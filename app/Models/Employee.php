<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function previousExperience()
    {
        return $this->hasMany(PreviousExperience::class, 'employee_id');
    }

    public function educationQualifications()
    {
        return $this->hasMany(EducationQualification::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }
}

