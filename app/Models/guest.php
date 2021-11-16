<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class guest extends Model
{
    public $table = "guests";

    use HasFactory, Sluggable;

    protected $fillable = [
        'event_id', 'name', 'slug', 'table_name', 'total_guest', 'email', 'phone_number'
    ];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
