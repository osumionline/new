<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\ApiModule\Actions\GetUsers;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;

#[OModuleAction(
	url: '/getUsers',
	services: ['User']
)]
class GetUsersAction extends OAction {
	/**
	 * Function used to get the user list
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->getTemplate()->addModelComponentList('list', $this->User_service->getUsers(), ['pass']);
	}
}
