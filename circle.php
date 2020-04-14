<?php
namespace shgysk8zer0\PHPGeo;
use \shgysk8zer0\PHPGeo\{Ellipse};
use \shgysk8zer0\PHPAPI\Interfaces\{
	GeoPointInterface,
	GeoEllipseInterface,
	GeoCircleInterface
};
use \JSONSerializable;

class Circle implements CircleInterface, JSONSerializable
{
	private $_center = null;

	private $_radius = 0;

	final public function __construct(GeoPointInterface $center, float $radius)
	{
		$this->setCenter($center);
		$this->setRadius($radius);
	}

	public function jsonSerialize(): array
	{
		return [
			'center' => $this->getCenter(),
			'radius' => $this->getRadius(),
		];
	}

	final public function getCenter(): GeoPointInterface
	{
		return $this->_center;
	}

	final public function setCenter(GeoPointInterface $val): void
	{
		$this->_center = $val;
	}

	final public function getRadius(): float
	{
		return $this->_radius;
	}

	final public function setRadius(float $val): void
	{
		$this->_radius = $val;
	}

	final public function asEllipse(): GeoEllipseInterface
	{
		return new Ellipse($this->getCenter(), $this->getRadius(), $this->getRadius());
	}
}
