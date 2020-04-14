<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoEllipseInterface extends GeoShapeInterface
{
	public function getCenter(): GeoPointInterface;

	public function setCenter(GeoPointInterface $val): void;

	public function getHeight(): float;

	public function setHeight(float $val): void;

	public function getWidth(): float;

	public function setWidth(float $val): void;
}
