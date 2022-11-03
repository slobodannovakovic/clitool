<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\Templating\ControllerTemplate;
use MakeFile\Config;
use MakeFile\File;
use Exception;

class MakeControllerFile extends FileCreation {
	protected static string $subDir = 'Controllers';

	public function make(): string {
		if(!file_exists($this->basePath.$this->file->fullDirPath)) {
			mkdir($this->basePath.$this->file->fullDirPath, 0775, true);
		}

		if(!file_exists($this->file->fullPathWithName)) {
			file_put_contents(
				$this->file->fullPathWithName,
				ControllerTemplate::get(['namespace' => $this->file->namespace, 'fileName' => $this->file->name])
			);

			return "\e[92mController created successfuly. \n";
		}
		
		throw new Exception("\e[91mController already exists! \n");
	}
}