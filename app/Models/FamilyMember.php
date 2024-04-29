<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
   // Specify the table name if necessary
   protected $table = 'family_members';

   // Specify the fillable attributes
   protected $fillable = [
       'employee_id', // Add employee_id to allow mass assignment
       'famname',
       'relationship',
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