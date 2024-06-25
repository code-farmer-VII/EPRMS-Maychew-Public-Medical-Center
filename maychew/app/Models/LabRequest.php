<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    use HasFactory;

    protected $fillable = ['technician_id', 'patient_id', 'lab_test'];
    public function technician()
    {
        return $this->belongsTo(LabTechnician::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
