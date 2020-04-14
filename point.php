<?php
namespace shgysk8zer0\PHPGeo;
use \shgysk8zer0\PHPGeo\{Line};
use \shgysk8zer0\PHPGeo\Interfaces\{
	GeoPointInterface,
	GeoLineInterface,
	GeoCircleInterface
};

use \JSONSerializable;
use \InvalidArgumentException;

class Point implements GeoPointInterface, JSONSerializable
{
	private $_x = 0;

	private $_y = 0;

	final public function __construct(int $x = 0, int $y = 0)
	{
		if (isset($x)) {
			$this->setX($x);
		}

		if (isset($y)) {
			$this->setY($y);
		}
	}

	final public function __toString(): string
	{
		return sprintf('%d, %d', $this->getX(), $this->getY());
	}

	final public function jsonSerialize(): array
	{
		return [
			$this->getX(),
			$this->getY(),
		];
	}

	final public function __debugInfo(): array
	{
		return [
			'x' => $this->getX(),
			'y' => $this->getY(),
		];
	}

	final public function __get(string $name):? float
	{
		switch($name) {
			case 'x':
				return $this->getX();

			case 'y':
				return $this->getY();

			default:
				throw new InvalidArgumentException(sprintf('Undefined coorinate: %s', $name));
				return null;
		}
	}

	final public function __set(string $name, float $value): void
	{
		switch($name) {
			case 'x':
				$this->setX($value);
				break;

			case 'y':
				$this->setY($value);
				break;

			default:
				throw new InvalidArgumentException(sprintf('Undefined coorinate: %s', $name));
		}
	}

	final public function getX(): float
	{
		return $this->_x;
	}

	final public function setX(float $val): void
	{
		$this->_x = $val;
	}

	final public function getY(): float
	{
		return $this->_y;
	}

	final public function setY(float $val): void
	{
		$this->_y = $val;
	}

	final public function modify(float $x, float $y): GeoPointInterface
	{
		return new self($this->getX() + $x, $this->getY() + $y);
	}

	final public function modifyX(float $x): GeoPointInterface
	{
		return $this->modify($x, 0);
	}

	final public function modifyY(float $y): GeoPointInterface
	{
		return $this->modify(0, $y);
	}

	final public function lineTo(PointInterface $pt): GeoLineInterface
	{
		return new Line($this, $pt);
	}

	final public function distanceTo(GeoPointInterface $pt): float
	{
		return $this->lineTo($pt)->getLength();
	}

	final public function circleAt(float $r): GeoCircleInterface
	{
		return new Circle($this, $r);
	}

	final public static function create(float ...$coords):? GeoPointInterface
	{
		if (count($coords) > 1) {
			return new self(...$pts);
		}
	}
}
