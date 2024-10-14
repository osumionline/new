<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetDate;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\UserService;

class GetDateComponent extends OComponent {
	private ?UserService $us = null;

	public string $date = '';

	public function __construct() {
		parent::__construct();

		$this->us = inject(UserService::class);
	}

	/**
	 * Function used to obtain current date
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->date = $this->us->getLastUpdate();
	}
}
