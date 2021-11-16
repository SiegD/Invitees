<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utterance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
