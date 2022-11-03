<?php
declare(strict_types=1);

namespace MakeFile\Tests;

trait FileCreationSetUpAndTearDown {
	public function setUp(): void {
		$this->subDir = 'Controllers';

		$this->fileFullName = 'Test/TestController';

		$this->fullDirPath = \MakeFile\Config::get('base_config')['testingBasePath'];
	}

	public function tearDown(): void {
		if(file_exists($this->fullDirPath)) {
			\MakeFile\Tests\Helper::cleanTempFilesAndFolders(
				$this->fullDirPath,
				$this->fileFullName,
				$this->subDir
			);
		}
	}
}