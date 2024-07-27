<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProposalID';
    protected $fillable = ['JobID', 'FreelancerID', 'ProposalDetails', 'Amount'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'JobID', 'JobID');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'FreelancerID', 'FreelancerID');
    }
}
