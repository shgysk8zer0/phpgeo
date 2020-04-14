<?php
namespace shgysk8zer0\PHPGeo;

use \shgysk8zer0\PHPGeo\{Point};
use \shgysk8zer0\PHPGeo\Interfaces\{
	GeoPointInterface,
	GeoPolygonInterface
};
use \Countable;
use \JSONSerializable;

class Polygon implements PolygonInterface, Countable, JSONSerializable
{
	private $_pts = [];

	final public function __construct(GeoPointInterface ...$pts)
	{
		$this->setPoints(...$pts);
	}

	final public function jsonSerialize(): array
	{
		return $this->getPoints();
	}

	final public function addPoints(GeoPointInterface ...$pts): void
	{
		$this->setPoint(...array_merge($pts, $this->getPoints()));
	}

	final public function getPoints(): array
	{
		return $this->_pts;
	}

	final public function setPoints(GeoPointInterface ...$val): void
	{
		$this->_pts = $val;
	}

	final public function toPointsArray(): array
	{
		return array_reduce($this->getPoints(), function(array $pts, GeoPointInterface $pt): array
		{
			$pts[] = $pt->getX();
			$pts[] = $pt->getY();
			return $pts;
		}, []);
	}

	final public function count(): int
	{
		return count($this->_pts);
	}
}
