<?php
namespace Nubs\Coordinator;

interface Spheroid
{
    /**
     * Get the equatorial radius of the spheroid in meters.
     *
     * @return float The equatorial radius of the spheroid in meters.
     */
    public function equatorialRadius();
}
