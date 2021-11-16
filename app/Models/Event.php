<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function Event_type()
    {
        return $this->belongsTo(event_type::class);
    }

    public function Event_location()
    {
        return $this->belongsTo(location::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Event_marriage()
    {
        return $this->hasOne(Event_marriage::class);
    }

    public function guest()
    {
        return $this->hasMany(guest::class);
    }

    public function utterance()
    {
        return $this->hasMany(Utterance::class);
    }

    public function getRouteKeyName()
    {
        return 'event_slug';
    }

    public function sluggable(): array
    {
        return [
            'event_slug' => [
                'source' => 'event_title'
            ]
        ];
    }
}
