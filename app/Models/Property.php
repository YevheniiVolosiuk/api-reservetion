<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\API\V1\PropertyObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'city_id',
        'address_street',
        'address_postcode',
        'lat',
        'long',
    ];

    public function city(): belongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function apartments(): hasMany
    {
        return $this->hasMany(Apartment::class);
    }

    public static function booted()
    {
        parent::booted();

        self::observe(PropertyObserver::class);
    }
}
