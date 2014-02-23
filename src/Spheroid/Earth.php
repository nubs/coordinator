<?php
namespace Nubs\Coordinator\Spheroid;

use Nubs\Coordinator\Spheroid as S;

class Earth implements S
{
    /**
     * Get the equatorial radius of the Earth in meters.
     *
     * @return float The equatorial radius of the Earth in meters.
     */
    public function equatorialRadius()
    {
        return 6378137.0;
    }
}
