<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\ApiModule\Actions\GetUser;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;

#[OModuleAction(
	url: '/getUser/:id',
	services: ['User']
)]
class GetUserAction extends OAction {
	/**
	 * Function used to get a user's data
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$status = 'ok';
		$user = $this->User_service->getUser($req->getParamInt('id'));

		if (is_null($user)) {
			$status = 'error';
		}

		$this->getTemplate()->add('status', $status);
		$this->getTemplate()->addModelComponent('user', $user, ['pass'], ['score']);
	}
}
