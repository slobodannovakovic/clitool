<?php
declare(strict_types=1);

namespace MakeFile;

use Exception;

class MakeFile {
	private array $validFileTypes;

	public string $basePath;

	public function __construct(private array $args) {
		$this->validFileTypes = Config::get('base_config')['validFileTypes'];

		$this->basePath = Config::get('base_config')['basePath'];
	}

	public function execute(): string {
		$this->validateInput();

		$class = 'MakeFile\Creation\Make'.ucfirst($this->args[0]).'File';

		return (new $class(basePath: $this->basePath, fullFileName: $this->args[1]))->make();
	}

	private function validateInput(): void {
		if(empty($this->args)) {
			throw new Exception("\e[93mWhat do you want to make? \n");
		}

		if(!in_array($this->args[0], $this->validFileTypes)) {
			throw new Exception("\e[91mSorry, cannot make {$this->args[0]}! \n");
		}

		if(!isset($this->args[1])) {
			throw new Exception("\e[93mWhat is the {$this->args[0]} name? \n");
		}
	}
}