<?php
namespace Nubs\Coordinator;

use Nubs\Coordinator\Coordinate;

class CoordinateFactory
{
    /**
     * Initialize a coordinate from radians.
     *
     * @param float $latitude The latitude in radians.
     * @param float $longitude The longitude in radians.
     */
    public function createFromRadians($latitude, $longitude)
    {
        return new Coordinate($latitude, $longitude);
    }

    /**
     * Initialize a coordinate from degrees.
     *
     * @param float $latitude The latitude in degrees.
     * @param float $longitude The longitude in degrees.
     */
    public function createFromDegrees($latitude, $longitude)
    {
        return new Coordinate(deg2rad($latitude), deg2rad($longitude));
    }
}
