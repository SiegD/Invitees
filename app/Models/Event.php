<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Event_type()
    {
        return $this->belongsTo(event_type::class);
    }

    public function event_location()
    {
        return $this->belongsTo(location::class);
    }

    public function User()
    {
        return $this->belongsTo(location::class);
    }

    public function Event_marriage()
    {
        return $this->hasOne(Event_marriage::class);
    }
}
