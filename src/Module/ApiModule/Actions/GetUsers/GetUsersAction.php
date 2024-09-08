<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\ApiModule\Actions\GetUsers;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Model\UserList\UserListComponent;

#[OModuleAction(
	url: '/getUsers',
	services: ['User']
)]
class GetUsersAction extends OAction {
	public ?UserListComponent $list = null;

	/**
	 * Function used to get the user list
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->list = new UserListComponent(['list' => $this->service['User']->getUsers()]);
	}
}
