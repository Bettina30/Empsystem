<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousExperience extends Model
{
   // Specify the table name if necessary
   protected $table = 'previous_experience';

   // Specify the fillable attributes
   protected $fillable = [
       'employee_id', // Add employee_id to allow mass assignment
       'company_name',
       'position',
       'start_date',
       'end_date',
       'created_at',
        'updated_at',
       // Add other fillable attributes as needed
   ];
 
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}