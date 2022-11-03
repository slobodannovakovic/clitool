<?php
declare(strict_types=1);

namespace MakeFile;

use Exception;

class MakeFile {
	public string $basePath;

	public function __construct(private array $args) {
		$this->basePath = Config::get('base_config')['basePath'];
	}

	public function execute(): string {
		(new ValidateInput($this->args))->handle();

		$class = 'MakeFile\Creation\Make'.ucfirst($this->args[0]).'File';

		return (new $class(basePath: $this->basePath, fullFileName: $this->args[1]))->make();
	}
}