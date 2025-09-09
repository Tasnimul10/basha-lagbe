<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'landlord_id',
        'location',
        'description',
        'image',
        'area',
        'city',
        'rent',
        'number_of_rooms',
        'number_of_washrooms',
        'floor_number',
        'balcony',
        'gas_system',
        'electricity',
        'service_charge',
        'status',
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function isFavoritedBy($user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}


