<?php
declare(strict_types=1);

namespace MakeFile\Creation;

use MakeFile\Templating\ModelTemplate;

class MakeModelFile extends FileCreation {

	protected static array $data = [
		'subDir' => 'Models',
		'fileTemplateClass' => ModelTemplate::class,
		'successMassege' => 'Model created successfuly.',
		'errorMessage' => 'Model already exists'
	];
}