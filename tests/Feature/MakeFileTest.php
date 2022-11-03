<?php
declare(strict_types=1);

namespace MakeFile\Tests\Feature;

use PHPUnit\Framework\TestCase;
use MakeFile\Templating\ControllerTemplate;
use MakeFile\Tests\FileCreationSetUpAndTearDown;

class MakeFileTest extends TestCase {
	use FileCreationSetUpAndTearDown;

	/** @test */
	public function creates_controller_file_depending_on_user_input_and_returns_success_msg(): void {
		$userInputArgs = [
			'controller',
			$this->fileFullName
		];

		$makeFile = new \MakeFile\MakeFile($userInputArgs);
		$makeFile->basePath = \MakeFile\Config::get('base_config')['testingBasePath'];

		$fileCreated = $makeFile->execute();

		$this->assertFileExists($makeFile->basePath.'Controllers/'.$userInputArgs[1].'.php');
		$this->assertStringContainsString('created successfuly', $fileCreated);
		$this->assertStringContainsString(
			'namespace Tests\temp\Controllers\Test;',
			file_get_contents($makeFile->basePath.'Controllers/'.$userInputArgs[1].'.php')
		);
		$this->assertStringContainsString(
			'class TestController extends Controller',
			file_get_contents($makeFile->basePath.'Controllers/'.$userInputArgs[1].'.php')
		);
		/*$this->assertSame(
			$this->controllerTestTemplate(),
			file_get_contents($makeFile->basePath.'Controllers/'.$userInputArgs[1].'.php')
		);*/
	}

	/** @test */
	public function creates_model_file_depending_on_user_input_and_returns_success_msg(): void {
		$this->subDir = 'Models';

		$this->fileFullName = 'Test/TestModel';

		$userInputArgs = [
			'model',
			$this->fileFullName
		];

		$makeFile = new \MakeFile\MakeFile($userInputArgs);
		$makeFile->basePath = \MakeFile\Config::get('base_config')['testingBasePath'];

		$fileCreated = $makeFile->execute();

		$this->assertFileExists($makeFile->basePath.'Models/'.$userInputArgs[1].'.php');
		$this->assertStringContainsString('created successfuly', $fileCreated);
		$this->assertStringContainsString(
			'namespace Tests\temp\Models\Test;',
			file_get_contents($makeFile->basePath.'Models/'.$userInputArgs[1].'.php')
		);
		$this->assertStringContainsString(
			'class TestModel extends Model',
			file_get_contents($makeFile->basePath.'Models/'.$userInputArgs[1].'.php')
		);
	}

	private function controllerTestTemplate(): string {
		return <<<TEXT
		<?php
		declare(strict_types=1);

		namespace Tests\\temp\Controllers\Test;

		use App\Controllers\Controller;

		class TestController extends Controller {
			public function __contruct() {
				//
			}
		}
		TEXT;
	}
}