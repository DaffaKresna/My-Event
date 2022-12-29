<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'venue',
        'slug',
        'date',
        'price',
        'detail',
    ];

    /**
     * Define relationship with the EventImage
     *
     * @return void
     */
    public function eventImages()
    {
        return $this->hasMany(EventImage::class, 'event_id')->orderBy('id', 'DESC');
    }
}
