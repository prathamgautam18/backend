<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $primaryKey = 'RatingID';
    protected $fillable = ['JobID', 'ClientID', 'FreelancerID', 'RatingValue', 'Comment'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'JobID', 'JobID');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'ClientID', 'ClientID');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'FreelancerID', 'FreelancerID');
    }
}
