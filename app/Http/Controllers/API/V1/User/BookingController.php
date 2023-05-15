<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $this->authorize('booking-manage');

        // Will implement booking management later
        return response()->json(['success' => true]);

    }
}
