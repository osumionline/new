<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Home\PhotoList;

use Osumi\OsumiFramework\Core\OComponent;

class PhotoListComponent extends OComponent {
	public array $list = [];

	public function __construct($vars) {
		parent::__construct($vars);
		$this->addInlineCss('photo_list');
	}

	public function run(): void {
		// If a component has a "run" method, it will be executed before displaying its final result.
	}
}
