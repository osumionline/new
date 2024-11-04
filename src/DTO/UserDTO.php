<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\DTO;

use Osumi\OsumiFramework\Core\ODTO;
use Osumi\OsumiFramework\Web\ORequest;

class UserDTO implements ODTO{
	public int $id_user = -1;

	public function isValid(): bool {
		return ($this->id_user !== -1);
	}

	public function load(ORequest $req): void {
		$id_user = $req->getParamInt('id');
		if (!is_null($id_user)) {
			$this->id_user = $id_user;
		}
	}
}
