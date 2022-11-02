<?php
declare(strict_types=1);

namespace MakeFile;

use Exception;

class Config {
	public static function get(string $file): array {
		$filePath = __DIR__."/../config/$file.php";

		if(!file_exists($filePath)) {
			throw new Exception("\e[91mConfig file $file doesn't exist\n");
		}

		$configFile = require $filePath;

		return $configFile;
	}
}