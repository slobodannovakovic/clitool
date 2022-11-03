<?php
declare(strict_types=1);

namespace MakeFile;

use Exception;

class ValidateInput {
	private array $validFileTypes;

	public function __construct(private array $args) {
		$this->validFileTypes = Config::get('base_config')['validFileTypes'];
	}

	public function handle(): void {
		$this->empty();

		$this->fileType();

		$this->fileName();

		$this->fileNameFormating();
	}

	public function empty(): void {
		if(empty($this->args)) {
			throw new Exception("\e[93mWhat do you want to make? \n");
		}
	}

	public function fileType(): void {
		if(!in_array($this->args[0], $this->validFileTypes)) {
			throw new Exception("\e[91mSorry, cannot make {$this->args[0]}! \n");
		}
	}

	public function fileName(): void {
		if(!isset($this->args[1])) {
			throw new Exception("\e[93mWhat is the {$this->args[0]} name? \n");
		}
	}

	public function fileNameFormating(): void {
		if(!preg_match('/^[a-zA-Z\/]+$/', $this->args[1])) {
			throw new Exception("\e[91mFull file name should contain only aplphabetical characters and / \n");
		}
	}
}