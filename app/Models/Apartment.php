<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'capacity_adults',
        'capacity_children'
    ];

    public function property(): belongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
