<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetUser;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Model\User\UserComponent;

class GetUserAction extends OAction {
	public string status = 'ok';
	public ?UserComponent user = null;

	/**
	 * Function used to get a user's data
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$user = $this->service['User']->getUser($req->getParamInt('id'));
		$this->user = new UserComponent(['User' => null]);

		if (is_null($user)) {
			$this->status = 'error';
		}
		else {
			$this->user->setValue('User', $user);
		}
	}
}
