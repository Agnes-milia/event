<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'event_id'])]
class Registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory, SoftDeletes;
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function priceCount(): int
    {
        $event = $this->event;
        $normal =  now() > $event->early_bird_until?true:false;
        $price = $this->event->early_bird_price;
        if ($normal) {
            $price *= $this->event->price_multiplier;
        }
        return (int)$price;
    }
}
