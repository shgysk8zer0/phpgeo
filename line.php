<?php
namespace shgysk8zer0\PHPGeo;

use \shgysk8zer0\PHPGeo\Interfaces\{
	GeoPointInterface,
	GeoLineInterface,
	GeoPolygonInterface
};
use \shgysk8zer0\PHPGeo\{Polygon};
use \JSONSerializable;

class Line implements GeoLineInterface, JSONSerializable
{
	private $_from = null;

	private $_to = null;

	final public function __construct(GeoPointInterface $from, GeoPointInterface $to)
	{
		$this->setFrom($from);
		$this->setTo($to);
	}

	final public function jsonSerialize(): array
	{
		return [$this->getFrom(), $this->getTo()];
	}

	final public function getFrom(): GeoPointInterface
	{
		return $this->_from;
	}

	final public function setFrom(GeoPointInterface $val): void
	{
		$this->_from = $val;
	}

	final public function getTo(): GeoPointInterface
	{
		return $this->_to;
	}

	final public function setTo(GeoPointInterface $val): void
	{
		$this->_to = $val;
	}

	final public function toPolygon(GeoPointInterface ...$pts): GeoPolygonInterface
	{
		return new Polygon($this->getFrom(), $this->getTo(), ...$pts);
	}

	final public function getLength(): float
	{
		return hypot($this->getRun(), $this->getRise());
	}

	final public function getAngle(): float
	{
		return atan($this->getRise() / $this->getRun()) * 180 / M_PI;
	}

	final public function getRise(): float
	{
		return $this->getFrom()->getY() - $this->getTo()->getY();
	}

	final public function getRun(): float
	{
		return $this->getFrom()->getX() - $this->getTo()->getX();
	}
}
