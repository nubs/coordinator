# Coordinator
A general purpose geo library for PHP.

[![Build Status](https://travis-ci.org/nubs/coordinator.png)](https://travis-ci.org/nubs/coordinator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nubs/coordinator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nubs/coordinator/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/nubs/coordinator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nubs/coordinator/?branch=master)

[![Latest Stable Version](https://poser.pugx.org/nubs/coordinator/v/stable.png)](https://packagist.org/packages/nubs/coordinator)
[![Total Downloads](https://poser.pugx.org/nubs/coordinator/downloads.png)](https://packagist.org/packages/nubs/coordinator)
[![Latest Unstable Version](https://poser.pugx.org/nubs/coordinator/v/unstable.png)](https://packagist.org/packages/nubs/coordinator)
[![License](https://poser.pugx.org/nubs/coordinator/license.png)](https://packagist.org/packages/nubs/coordinator)

[![Dependency Status](https://www.versioneye.com/user/projects/534eb363fe0d071c050007af/badge.svg?style=flat)](https://www.versioneye.com/user/projects/534eb363fe0d071c050007af)

## Installation
This package uses [composer](https://getcomposer.org) so you can just add
`nubs/coordinator` as a dependency to your `composer.json` file or execute the
following command:

```bash
composer require nubs/coordinator
```

## Usage

### Coordinates
A coordinate is a latitude/longitude pair.  They are created using radians,
although the `CoordinateFactory` and various `CoordinateSystem`'s discussed
below can help create them as well.

#### Creating a coordinate
Using the constructor, you can create a coordinate using radians.
```php
<?php
use Nubs\Coordinator\Coordinate;

$coordinate = new Coordinate($latitudeInRadians, $longitudeInRadians);
```

##### Using the Coordinate Factory
Using the `CoordinateFactory`, you can create coordinates in a similar way.
```php
<?php
use Nubs\Coordinator\CoordinateFactory;

$coordinateFactory = new CoordinateFactory();
$coordinate = $coordinateFactory->createFromRadians(
    $latitudeInRadians,
    $longitudeInRadians
);
```

The `CoordinateFactory`, however, can also create coordinates from latitude and
longitude specified in degrees.
```php
<?php
use Nubs\Coordinator\CoordinateFactory;

$coordinateFactory = new CoordinateFactory();
$coordinate = $coordinateFactory->createFromDegrees(
    $latitudeInDegrees,
    $longitudeInDegrees
);
```

#### Accessing Coordinate Data
The latitude and longitude in radians can be pulled back out of the `Coordinate`.
```php
echo "Latitude: {$coordinate->latitudeInRadians()}\n";
echo "Longitude: {$coordinate->longitudeInRadians()}\n";
```

The latitude and longitude can also be pulled back out in degrees.
```php
echo "Latitude: {$coordinate->latitudeInDegrees()}\n";
echo "Longitude: {$coordinate->longitudeInDegrees()}\n";
```

A `__toString()` helper also exists that returns the coordinate in degrees.
```php
echo (string)$coordinate;
```

### Coordinate Systems
Coordinate systems help convert coordinates from other systems/projections into
standard latitude/longitude.  Currently the `Mercator` projection is defined.

Coordinate systems operate on a given `Spheroid`, and there is an `Earth`
spheroid defined.

#### Converting Coordinates 
A coordinate in a coordinate system can be converted to degrees/radians.
```php
<?php
use Nubs\Coordinator\CoordinateFactory;
use Nubs\Coordinator\CoordinateSystem\Mercator;
use Nubs\Coordinator\Spheroid\Earth;

$mercator = new Mercator(new Earth(), new CoordinateFactory());
$coordinate = $mercator->loadCoordinate($xCoordinate, $yCoordinate);
echo (string)$coordinate;
```

## License
Coordinator is licensed under the MIT license.
