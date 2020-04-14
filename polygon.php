<?php
namespace shgysk8zer0\PHPGeo;

use \shgysk8zer0\PHPGeo\{Point};
use \shgysk8zer0\PHPGeo\Interfaces\{
	GeoPointInterface,
	GeoPolygonInterface
};
use \Countable;
use \Generator;
use \JSONSerializable;

class Polygon implements GeoPolygonInterface, Countable, JSONSerializable
{
	private $_pts = [];

	final public function __construct(GeoPointInterface ...$pts)
	{
		$this->setPoints(...$pts);
	}

	final public function __debugInfo(): array
	{
		return $this->getPoints();
	}

	final public function jsonSerialize(): array
	{
		return $this->getPoints();
	}

	final public function addPoints(GeoPointInterface ...$pts): void
	{
		$this->setPoints(...array_merge($pts, $this->getPoints()));
	}

	final public function getPoints(): array
	{
		return $this->_pts;
	}

	final public function getPoint(int $index):? GeoPointInterface
	{
		return $this->_pts[$index] ?? null;
	}

	final public function getStartingPoint():? GeoPointInterface
	{
		return $this->getPoint(0);
	}

	final public function getLastPoint():? GeoPointInterface
	{
		$len = count($this);
		return $len === 0 ? null : $this->getPoint($len - 1);
	}

	final public function setPoints(GeoPointInterface ...$val): void
	{
		$this->_pts = $val;
	}

	final public function close(): bool
	{
		if ($this->isOpen()) {
			return false;
		} else {
			$start = $this->getStartingPoint();
			$this->_pts[] = new Point($start->getX(), $start->getY());
			return true;
		}
	}

	final public function isClosed(): bool
	{
		return count($this) > 2 and ! $this->getStartingPoint()->isSamePointAs($this->getLastPoint());
	}

	final public function isOpen(): bool
	{
		return ! $this->isClosed();
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

	public function lineSegments(): Generator
	{
		$i = 0;

		while ($i < count($this)) {
			[$from, $to] = [$this->getPoint($i++), $this->getPoint($i)];

			if (isset($from, $to)) {
				yield new Line($from, $to);
			} else {
				break;
			}
		}
	}

	final public function count(): int
	{
		return count($this->_pts);
	}
}
