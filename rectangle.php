<?php
namespace shgysk8zer0\PHPGeo;

use \shgysk8zer0\PHPGeo\Interfaces\{GeoPointInterface, GeoRectangleInterface};

class Rectangle implements GeoRectangleInterface
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
		return [
			'from' => $this->getFrom(),
			'to'   => $this->getTo(),
		];
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
}
