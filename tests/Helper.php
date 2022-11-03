<?php
declare(strict_types=1);

namespace MakeFile\Tests;

class Helper {
	public static function cleanTempFilesAndFolders(string $basePath, string $fullFileName, string $subDir): void {
		$subDir .= '/';

		unlink($basePath.$subDir.$fullFileName.'.php');

		$fullFileNameArr = explode('/',$fullFileName);

		array_pop($fullFileNameArr);

		foreach($fullFileNameArr as $dir) {
			if(is_dir($basePath.$subDir.$dir)) {
				rmdir($basePath.$subDir.$dir);
			}
		}

		rmdir($basePath.$subDir);
		rmdir($basePath);
	}
}
