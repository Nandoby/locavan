<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [''];


    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Permets d'obtenir la moyenne de tous les commentaires par rapport à un véhicule (annonce)
     *
     * @return int
     */
    public function ratingAverage(): int
    {
        return (int)$this->comments()->average('rating');
    }

    public function getNotAvailableDays()
    {

        $notAvailableDays = [];

        foreach ($this->bookings as $booking) {


            $startDate = Carbon::make($booking->start_date)->timestamp;
            $endDate = Carbon::make($booking->end_date)->timestamp;
            $result = range($startDate, $endDate, 86400);

            $days = array_map(function ($dayTimestamp) {
                return new \DateTime(date('Y-m-d', $dayTimestamp));
            }, $result);

            $notAvailableDays = array_merge_recursive($notAvailableDays, $days);
        }

        return $notAvailableDays;
    }

    public function getPrice()
    {
        return (number_format($this->price, 2, ',', ' '));
    }


}
