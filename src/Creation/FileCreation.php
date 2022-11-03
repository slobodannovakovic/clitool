<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\File;
use Exception;

abstract class FileCreation {
	protected string $basePath;

	protected File $file;

	public function __construct(
		string $basePath,
		protected string $fullFileName
	) {
		$this->basePath = $basePath.static::$data['subDir'].'/';

		$this->file = new File($this->basePath, $this->fullFileName);
	}

	public function make(): string {
		if(!file_exists($this->basePath.$this->file->fullDirPath)) {
			mkdir($this->basePath.$this->file->fullDirPath, 0775, true);
		}

		if(!file_exists($this->file->fullPathWithName)) {
			file_put_contents(
				$this->file->fullPathWithName,
				static::$data['fileTemplateClass']::get([
					'namespace' => $this->file->namespace,
					'fileName' => $this->file->name
				])
			);

			return "\e[92m".static::$data['successMassege']." \n";
		}
		
		throw new Exception("\e[91m".static::$data['errorMessage']." \n");
	}
}