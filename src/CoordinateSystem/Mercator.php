<?php
namespace Nubs\Coordinator\CoordinateSystem;

use Nubs\Coordinator\CoordinateFactory;
use Nubs\Coordinator\Spheroid;

class Mercator
{
    /**
     * The spheroid being referenced.
     *
     * @var \Nubs\Coordinator\Spheroid
     */
    private $_spheroid;

    /**
     * The coordinate factory.
     *
     * @var \Nubs\Coordinator\CoordinateFactory
     */
    private $_coordinateFactory;

    /**
     * Initialize a Mercator Coordinate System for the given spheroid.
     *
     * @param \Nubs\Coordinator\Spheroid $spheroid The spheroid being referenced.
     * @param \Nubs\Coordinator\CoordinateFactory $coordinateFactory The coordinate factory
     */
    public function __construct(Spheroid $spheroid, CoordinateFactory $coordinateFactory)
    {
        $this->_spheroid = $spheroid;
        $this->_coordinateFactory = $coordinateFactory;
    }

    /**
     * Load a coordinate from the mercator coordinates.
     *
     * This uses a spherical model of the spheroid.
     *
     * @param float $x The x coordinate.
     * @param float $y The y coordinate.
     * @return \Nubs\Coordinator\Coordinate The coordinate after conversion.
     */
    public function loadCoordinate($x, $y)
    {
        $radius = $this->_spheroid->equatorialRadius();

        return $this->_coordinateFactory->createFromRadians($this->_gudermannian($y / $radius), $x / $radius);
    }

    /**
     * Compute the Gudermannian of the given number.
     *
     * @see http://en.wikipedia.org/wiki/Gudermannian_function
     *
     * Useful for computing the latitude in radians when given the latitudinal distance from the equator.
     *
     * @param float $x
     * @return float
     */
    private function _gudermannian($x)
    {
        return atan(sinh($x));
    }
}
