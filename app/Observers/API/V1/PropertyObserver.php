<?php

namespace App\Observers\API\V1;

use App\Models\Property;

class PropertyObserver
{
    public function creating(Property $property)
    {
        if (auth()->check()) {
            $property->owner_id = auth()->id();
        }

//        simulate saving data from Google Api because API is not free
        if (is_null($property->lat) && is_null($property->long) && !(app()->environment('testing'))) {
            $property->lat = fake()->latitude();
            $property->long = fake()->longitude();
        }

//        if (is_null($property->lat) && is_null($property->long)) {
//            $fullAddress = $property->address_street . ', '
//                . $property->address_postcode . ', '
//                . $property->city->name . ', '
//                . $property->city->country->name;
//            $result = app('geocoder')->geocode($fullAddress)->get();
//            if ($result->isNotEmpty()) {
//                $coordinates = $result[0]->getCoordinates();
//                $property->lat = $coordinates->getLatitude();
//                $property->long = $coordinates->getLongitude();
//            }
//        }
    }
}
