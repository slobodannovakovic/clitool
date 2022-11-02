<?php
declare(strict_types=1);

namespace MakeFile\Contracts;

interface Template {
	public static function get(array $args): string;
}