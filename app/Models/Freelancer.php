<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $primaryKey = 'FreelancerID';

    // Define the table name if it differs from the default
    protected $table = 'freelancers';

    // Define fillable attributes to allow mass assignment
    protected $fillable = [
        'Name',
        'Email',
        'Phone',
        'Skills',
        'Rate'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'FreelancerID', 'FreelancerID');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'FreelancerID', 'FreelancerID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'FreelancerID', 'FreelancerID');
    }
}
