<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
use Osumi\OsumiFramework\App\Model\User;

class UserService extends OService {
	/**
	 * Get current date and time
	 *
	 * @return string Current date and time
	 */
	public function getLastUpdate(): string {
		return date('d-m-Y H:i:s');
	}

	/**
	 * Get list of all users
	 *
	 * @return array List of all users
	 */
	public function getUsers(): array {
		return User::all();
	}

	/**
	 * Get one specific user
	 *
	 * @param int $id Id of the user
	 *
	 * @return User Asked user
	 */
	public function getUser(int $id): User {
		return User::findOne(['id' => $id]);
	}
}
