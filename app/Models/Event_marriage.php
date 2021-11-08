<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_marriage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function ceremonial_location()
    {
        return $this->belongsTo(location::class);
    }
}
