<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Home\User;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\DTO\UserDTO;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Service\PhotoService;
use Osumi\OsumiFramework\App\Component\Home\PhotoList\PhotoListComponent;

class UserComponent extends OComponent {
	private ?UserService  $us = null;
	private ?PhotoService $ps = null;

	public string $name = '';
	public ?PhotoListComponent $photo_list = null;

	public function __construct() {
		parent::__construct();

		$this->us = inject(UserService::class);
		$this->ps = inject(PhotoService::class);
	}

	/**
	 * User's page
	 *
	 * @param UserDTO $req Data Transfer Object with "isValid" method and methods for this functions parameters
	 * @return void
	 */
	public function run(UserDTO $req): void {
		if (!$req->isValid()) {
			echo "ERROR!";
			exit;
		}

		$id_user = $req->id_user;
		$user = $this->us->getUser($id_user);
		$list = $this->ps->getPhotos($user->id);

		$this->name = $user->user;
		$this->photo_list = new PhotoListComponent(['list' => $list]);
	}
}
