<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    public function distance($lat1, $lon1, $lat2, $lon2, $dist)
    {
        $radius = 6371000; // Earth's radius in meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;
        return $distance <= $dist;
    }


    public function checkLocation($latitude, $longitude)
    {
        $place_latitude = Settings::getValue('latitude');
        $place_longitude = Settings::getValue('longitude');
        $place_distance = Settings::getValue('jarak');

        $jarak = $this->distance($latitude, $longitude, $place_latitude, $place_longitude, $place_distance);

        return $jarak;
    }
    
    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $radius = 6371000; // Earth's radius in meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;
        return $distance;
    }

    public function formatDistance($distance)
    {
        if ($distance > 1000) {
            $formattedDistance = round($distance / 1000, 2) . ' KM';
        } else {
            $formattedDistance = round($distance, 2) . ' M';
        }
        return $formattedDistance;
    }
}
