<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
use Osumi\OsumiFramework\DB\ODB;
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
		$db = new ODB();
		$sql = "SELECT * FROM `user`";
		$db->query($sql);
		$list = [];

		while ($res=$db->next()) {
			$user = new User();
			$user->update($res);
			array_push($list, $user);
		}

		return $list;
	}

	/**
	 * Get one specific user
	 *
	 * @param int $id Id of the user
	 *
	 * @return User Asked user
	 */
	public function getUser(int $id): User {
		$user = new User();
		$user->find(['id'=>$id]);

		return $user;
	}
}
