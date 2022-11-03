<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\File;

abstract class FileCreation {
	protected string $basePath;

	protected File $file;

	public function __construct(
		string $basePath,
		protected string $fullFileName
	) {
		$this->basePath = $basePath.static::$subDir.'/';

		$this->file = new File($this->basePath, $this->fullFileName);
	}

	abstract public function make(): string;
}