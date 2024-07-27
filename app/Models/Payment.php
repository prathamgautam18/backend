<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'PaymentID';
    protected $fillable = ['JobID', 'Amount', 'PaymentDate', 'PaymentStatus'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'JobID', 'JobID');
    }
}
