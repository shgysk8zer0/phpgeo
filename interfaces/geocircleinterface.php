<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoCircleInterface extends GeoInterface
{
	public function getCenter(): GeoPointInterface;

	public function setCenter(GeoPointInterface $val): void;

	public function getRadius(): float;

	public function setRadius(float $val): void;

	public function asEllipse(): GeoEllipseInterface;
}
