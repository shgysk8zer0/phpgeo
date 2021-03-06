<?php
namespace shgysk8zer0\PHPGeo\Interfaces;

interface GeoPointInterface extends GeoInterface
{
	public function getX(): float;

	public function setX(float $val): void;

	public function getY(): float;

	public function setY(float $val): void;

	public function modify(float $x, float $y): GeoPointInterface;

	public function modifyX(float $x): GeoPointInterface;

	public function modifyY(float $y): GeoPointInterface;

	public function isSamePointAs(GeoPointInterface $pt): bool;

	public function createCircleOfRadius(float $r): GeoCircleInterface;

	public function lineTo(GeoPointInterface $pt): GeoLineInterface;

	public function distanceTo(GeoPointInterface $pt): float;
}
