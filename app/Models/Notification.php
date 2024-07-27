<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $primaryKey = 'NotificationID';
    protected $fillable = ['UserID', 'NotificationType', 'NotificationMessage', 'NotificationDate'];

    public function user()
    {
        return $this->belongsTo(Client::class, 'UserID', 'ClientID')->orWhere('UserID', 'FreelancerID');
    }
}
