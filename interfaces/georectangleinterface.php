<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoRectangleInterface extends GeoInterface
{
	public function getFrom(): GeoPointInterface;

	public function setFrom(GeoPointInterface $val): void;

	public function getTo(): GeoPointInterface;

	public function setTo(GeoPointInterface $val): void;
}
