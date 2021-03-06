<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoLineInterface extends GeoInterface
{
	public function getFrom(): GeoPointInterface;

	public function setFrom(GeoPointInterface $val): void;

	public function getTo(): GeoPointInterface;

	public function setTo(GeoPointInterface $val): void;

	public function toPolygon(GeoPointInterface ...$pts): GeoPolygonInterface;

	public function getLength(): float;

	public function getAngle(): float;

	public function getRise(): float;

	public function getRun(): float;
}
