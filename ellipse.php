<?php
namespace shgysk8zer0\PHPGeo;

use \shgysk8zer0\PHPGeo\Interfaces\{
	GeoPointInterface,
	GeoEllipseInterface
};

final class Ellipse implements GeoEllipseInterface
{
	private $_center = null;

	private $_width = 0;

	private $_height = 0;

	final public function __construct(GeoPointInterface $center, float $width, float $height)
	{
		$this->setCenter($center);
		$this->setWidth($width);
		$this->setHeight($height);
	}

	final public function getCenter(): GeoPointInterface
	{
		return $this->_center;
	}

	final public function setCenter(GeoPointInterface $val): void
	{
		$this->_center = $val;
	}

	final public function getHeight(): float
	{
		return $this->_height;
	}

	final public function setHeight(float $val): void
	{
		$this->_height = $val;
	}

	final public function getWidth(): float
	{
		return $this->_width;
	}

	final public function setWidth(float $val): void
	{
		$this->_width = $val;
	}
}
