<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\Templating\ControllerTemplate;

class MakeControllerFile extends FileCreation {

	protected static array $data = [
		'subDir' => 'Controllers',
		'fileTemplateClass' => ControllerTemplate::class,
		'successMassege' => 'Controller created successfuly.',
		'errorMessage' => 'Controller already exists'
	];
}