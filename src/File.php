<?php
declare(strict_types=1);

namespace MakeFile;

class File {
	private array $subDirs;

	public readonly string $name;

	public readonly string $fullDirPath;

	public readonly string $fullPathWithName;

	public function __construct(
		private string $basePath,
		private string $fullFileName
	) {
		$this->subDirs = explode('/', $this->fullFileName);

		$this->name = array_pop($this->subDirs);

		$this->fullDirPath = implode('/',$this->subDirs).'/';

		$this->namespace = str_replace('/', '\\', ucfirst(rtrim($this->basePath.$this->fullDirPath, '/')));

		$this->fullPathWithName = $this->basePath.$this->fullDirPath.$this->name.Config::get('base_config')['fileExtension'];
	}
}