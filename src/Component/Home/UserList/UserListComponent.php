<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Home\UserList;

use Osumi\OsumiFramework\Core\OComponent;

class UserListComponent extends OComponent {
	public array $list = [];

	public function __construct($vars) {
		parent::__construct($vars);
		$this->addInlineCss('Users');
	}
}
