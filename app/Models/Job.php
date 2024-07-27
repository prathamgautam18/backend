<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the default naming convention
    protected $table = 'jobs'; 

    // Specify the primary key and its type
    protected $primaryKey = 'JobID';
    protected $keyType = 'int';
    public $incrementing = true; // Set to false if your primary key is not auto-incrementing

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'Title', 'Description', 'Budget', 'Deadline', 'Location', 'Salary', 'JobType', 'Skills', 'ClientID', 'FreelancerID'
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class, 'ClientID', 'ClientID');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'FreelancerID', 'FreelancerID');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'JobID', 'JobID');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'JobID', 'JobID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'JobID', 'JobID');
    }
}
