<?php

namespace App\Http\Controllers;

use App\Models\ipmodel;
use App\Models\visitmodel;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class VisitController extends Controller
{


    public function recordVisit(Request $request)
{
    $ipAddress = $request->ip_address;
    $visitTime = Carbon::now();
    visitmodel::create([
        'ip_address' => $ipAddress,
        'visit_time' => $visitTime,
    ]);
    if($ipAddress=='192.168.0.1'){
        echo  "User in Office FirstFloor";
    }
    elseif($ipAddress=='192.168.0.2'){
        echo  "User in Office GroundFloor";
    }
    else{
        echo "other user";
    }
    echo "Visit recorded";
}

public function recordDeparture(Request $request)
{
    $ipAddress = $request->ip_address;
    $departureTime = Carbon::now();
    visitmodel::where('ip_address', $ipAddress)
        ->whereNull('departure_time')
        ->update(['departure_time' => $departureTime]);
    return 'Departure recorded';
}

public function index()
{
    // Perform other actions
    // $this->recordVisit();
    $total=visitmodel::all();
    return $total;
}


public function departure()
{
    // Perform other actions
    // $this->recordDeparture();
    // Return the response
}

public function getLocationForUser()
{
    $ipAddress = request()->ip();
    $location = $this->getLocation($ipAddress);
    // Return the location response
}

}


