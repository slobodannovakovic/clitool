<?php
declare(strict_types=1);

namespace MakeFile\Tests\Unit;

use PHPUnit\Framework\TestCase;
use MakeFile\Tests\FileCreationSetUpAndTearDown;

class ValidateInputTest extends TestCase {
	use FileCreationSetUpAndTearDown;

	/** @test */
	/*public function throws_exception_if_type_of_file_is_not_entered(): void {
		$this->expectException(\Exception::class);

		(new \MakeFile\MakeFile([]))->execute();
	}*/

	/** @test */
	/*public function throws_exception_if_invalid_file_type_is_entered(): void {
		$this->expectException(\Exception::class);

		(new \MakeFile\MakeFile(['executor']))->execute();
	}*/

	/** @test */
	/*public function throws_exception_if_file_name_is_not_entered(): void {
		$this->expectException(\Exception::class);

		(new \MakeFile\MakeFile(['controller']))->execute();
	}*/
	

	/**
	 * @test
	 * 
	 * @dataProvider userInutValidation
	 */
	public function throws_exception_on_invalid_user_input(array $input): void {
		$this->expectException(\Exception::class);

		(new \MakeFile\MakeFile($input))->execute();
	}

	/** @test */
	public function throws_exception_if_file_exists(): void {
		$userInputArgs = [
			'controller',
			$this->fileFullName
		];

		$this->expectException(\Exception::class);

		$makeFile = new \MakeFile\MakeFile($userInputArgs);
		$makeFile->basePath = \MakeFile\Config::get('base_config')['testingBasePath'];

		$makeFile->execute();
		$makeFile->execute();
	}

	public function userInutValidation(): array {
		return [
			'no file type entered' => [[]],
			'invalid file type entered' => [['unknown_file_type']],
			'no file name entered' => [['controller']],
			'unallowed chars used in full file name' => [['controller', 'Test-TestController']],
			'numbers used in full file name' => [['model', 'TestModel12']]
		];
	}
}