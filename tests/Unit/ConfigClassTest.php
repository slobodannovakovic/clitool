<?php
declare(strict_types=1);

namespace MakeFile\Tests\Unit;

use PHPUnit\Framework\TestCase;
use MakeFile\Config;

class ConfigClassTest extends TestCase {
	/** @test */
	public function throws_exception_if_file_doesnt_exist(): void {
		$this->expectException(\Exception::class);

		Config::get('unknown_file');
	}

	/** @test */
	public function if_file_exists_returns_array_of_config_values(): void {
		$this->assertIsArray(Config::get('base_config'));
	}

	/** @test */
	public function returns_correct_file_content(): void {
		$filePath = __DIR__."/../../config/base_config.php";

		$file = require $filePath;

		$this->assertSame($file, Config::get('base_config'));
	}
}