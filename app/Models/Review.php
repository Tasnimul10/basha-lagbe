<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'landlord_id',
        'user_id',
        'property_id',
        'review_text',
        'rating',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }
}
