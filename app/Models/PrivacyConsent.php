<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrivacyConsent extends Model
{
    use HasFactory;

    protected $table = 'privacy_consents';
    protected $fillable = [
        'user_id',
        'marketing_consent',
        'profiling_consent',
        'ip_address'
    ];

    // Relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
