<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

use \Generator;

interface GeoPolygonInterface extends GeoShapeInterface
{
	public function addPoints(GeoPointInterface ...$pts): void;

	public function getPoints(): array;

	public function getPoint(int $index):? GeoPointInterface;

	public function getStartingPoint():? GeoPointInterface;

	public function getLastPoint():? GeoPointInterface;

	public function setPoints(GeoPointInterface ...$val): void;

	public function toPointsArray(): array;

	public function isClosed(): bool;

	public function isOpen(): bool;

	public function close(): bool;

	public function lineSegments(): Generator;
}
