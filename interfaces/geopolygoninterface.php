<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoPolygonInterface extends GeoInterface
{
	public function addPoints(GeoPointInterface ...$pts): void;

	public function getPoints(): array;

	public function setPoints(GeoPointInterface ...$val): void;

	public function toPointsArray(): array;
}
