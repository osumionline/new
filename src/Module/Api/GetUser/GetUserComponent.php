<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetUser;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Component\Model\User\UserComponent;

class GetUserComponent extends OComponent {
	private ?UserService $us = null;

	public string $status = 'ok';
	public ?UserComponent $user = null;

	public function __construct() {
		parent::__construct();

		$this->us = inject(UserService::class);
		$this->user = new UserComponent();
	}

	/**
	 * Function used to get a user's data
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$u = $this->us->getUser($req->getParamInt('id'));

		if (is_null($u)) {
			$this->status = 'error';
		}
		else {
			$this->user->user = $u;
		}
	}
}
