<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'AdminID';

    // Define the table name if it differs from the default
    protected $table = 'admins';

    // Define fillable attributes to allow mass assignment
    protected $fillable = [
        'Name',
        'Email',
        'Phone'
    ];
}
