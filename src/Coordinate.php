<?php
namespace Nubs\Coordinator;

class Coordinate
{
    /**
     * Latitude in radians
     *
     * @var float
     */
    private $_latitude;

    /**
     * Longitude in radians
     *
     * @var float
     */
    private $_longitude;

    /**
     * Initialize a coordinate.
     *
     * @param float $latitude The latitude in radians
     * @param float $longitude The longitude in radians
     */
    public function __construct($latitude, $longitude)
    {
        $this->_latitude = $latitude;
        $this->_longitude = $longitude;
    }

    /**
     * Convert the latitude to radians.
     *
     * @return float The latitude in radians.
     */
    public function latitudeInRadians()
    {
        return $this->_latitude;
    }

    /**
     * Convert the longitude to radians.
     *
     * @return float The longitude in radians.
     */
    public function longitudeInRadians()
    {
        return $this->_longitude;
    }

    /**
     * Convert the latitude to degrees.
     *
     * @return float The latitude in degrees.
     */
    public function latitudeInDegrees()
    {
        return rad2deg($this->_latitude);
    }

    /**
     * Convert the longitude to degrees.
     *
     * @return float The longitude in degrees.
     */
    public function longitudeInDegrees()
    {
        return rad2deg($this->_longitude);
    }

    /**
     * Return the latitude and longitude in degrees as a string.
     *
     * @return string A string representation of the coordinate.
     */
    public function __toString()
    {
        return "{$this->latitudeInDegrees()}, {$this->longitudeInDegrees()}";
    }
}
