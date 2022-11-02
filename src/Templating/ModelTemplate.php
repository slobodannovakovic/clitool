<?php
declare(strict_types=1);

namespace MakeFile\Templating;

use MakeFile\Contracts\Template;

class ModelTemplate implements Template {
	public static function get(array $args): string {
		return <<<TEXT
		<?php
		declare(strict_types=1);

		namespace {$args['namespace']};

		use App\Models\Model;

		class {$args['fileName']} extends Model {

		}
		TEXT;
	}
}