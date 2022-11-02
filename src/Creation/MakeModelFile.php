<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\Templating\ModelTemplate;
use MakeFile\Contracts\MakeFileInterface;
use MakeFile\Config;
use MakeFile\File;
use Exception;

class MakeModelFile implements MakeFileInterface {
	private File $file;

	private string $basePath;

	public function __construct(
		string $basePath,
		private string $fullFileName
	) {
		$this->basePath = $basePath.'Models/';

		$this->file = new File($this->basePath, $this->fullFileName);
	}

	public function make(): string {
		if(!file_exists($this->basePath.$this->file->fullDirPath)) {
			mkdir($this->basePath.$this->file->fullDirPath, 0775, true);
		}

		if(!file_exists($this->file->fullPathWithName)) {
			file_put_contents(
				$this->file->fullPathWithName,
				ModelTemplate::get(['namespace' => $this->file->namespace, 'fileName' => $this->file->name])
			);

			return "\e[92mModel created successfuly. \n";
		}
		
		throw new Exception("\e[91mModel already exists! \n");
	}
}