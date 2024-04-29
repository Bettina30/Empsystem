<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationQualification extends Model
{

    protected $table = 'education_qualifications';

    // Specify fillable attributes
    protected $fillable = [
        'employee_id',
        'degree',
        'institution',
        'graduation_date',
        'created_at',
        'updated_at',
    ];
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}