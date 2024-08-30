<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\HomeModule\Actions\User;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\DTO\UserDTO;
use Osumi\OsumiFramework\App\Component\Home\PhotoListComponent\PhotoListComponent;

#[OModuleAction(
	url: '/user/:id',
	services: ['User', 'Photo']
)]
class UserAction extends OAction {
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
		$user = $this->User_service->getUser($id_user);
		$list = $this->Photo_service->getPhotos($user->get('id'));

		$photo_list_component = new PhotoListComponent(['list'=>$list]);

		$this->getTemplate()->add('name', $user->get('user'));
		$this->getTemplate()->add('photo_list', $photo_list_component);
	}
}
