<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\HomeModule\Actions\User;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\DTO\UserDTO;
use Osumi\OsumiFramework\App\Component\Home\PhotoList\PhotoListComponent;

#[OModuleAction(
	url: '/user/:id',
	services: ['User', 'Photo']
)]
class UserAction extends OAction {
	public string $name = '';
	public ?PhotoListComponent $photo_list = null;

	/**
	 * User's page
	 *
	 * @param UserDTO $req Data Transfer Object with "isValid" method and methods for this functions parameters
	 * @return void
	 */
	public function run(UserDTO $req):void {
		if (!$req->isValid()) {
			echo "ERROR!";
			exit;
		}
		$id_user = $req->getIdUser();
		$user = $this->service['User']->getUser($id_user);
		$list = $this->service['Photo']->getPhotos($user->get('id'));

		$this->name = $user->get('user');
		$this->photo_list = new PhotoListComponent(['list'=>$list]);
	}
}
