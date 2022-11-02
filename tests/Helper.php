<?php
declare(strict_types=1);

namespace MakeFile\Tests;

class Helper {
	public static function cleanTempFilesAndFolders(string $basePath, string $fullFileName): void {
		unlink($basePath.'Controllers/'.$fullFileName.'.php');

		$fullFileNameArr = explode('/',$fullFileName);

		array_pop($fullFileNameArr);

		foreach($fullFileNameArr as $dir) {
			if(is_dir($basePath.'Controllers/'.$dir)) {
				rmdir($basePath.'Controllers/'.$dir);
			}
		}

		rmdir($basePath.'Controllers');
		rmdir($basePath);
	}
}
