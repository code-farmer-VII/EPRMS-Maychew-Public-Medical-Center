<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender'];
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'assigns');
    }

    public function labTechnician()
    {
        return $this->belongsToMany(LabTechnician::class, 'LabRequest');
    }

    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function labResults()
    {
        return $this->hasMany(LabResult::class);
    }
    
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }



}
