<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetUsers;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Component\Model\UserList\UserListComponent;

class GetUsersComponent extends OComponent {
	private ?UserService $us = null;

	public ?UserListComponent $list = null;

	public function __construct() {
		parent::__construct();

		$this->us = inject(UserService::class);
	}

	/**
	 * Function used to get the user list
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->list = new UserListComponent(['list' => $this->us->getUsers()]);
	}
}
