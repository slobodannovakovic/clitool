<?php
declare(strict_types=1);

namespace MakeFile\Templating;

use MakeFile\Contracts\Template;

class ControllerTemplate implements Template {
	public static function get(array $args): string {
		return <<<TEXT
		<?php
		declare(strict_types=1);

		namespace {$args['namespace']};

		use App\Controllers\Controller;

		class {$args['fileName']} extends Controller {
			public function __contruct() {
				//
			}
		}
		TEXT;
	}
}