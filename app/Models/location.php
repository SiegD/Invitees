<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function event_marriages()
    {
        return $this->hasMany(Event_marriage::class);
    }
}
