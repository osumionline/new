<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
use Osumi\OsumiFramework\DB\ODB;
use Osumi\OsumiFramework\App\Model\Photo;

class PhotoService extends OService {
	/**
	 * Get given user's photo list
	 *
	 * @param int $id User's Id
	 *
	 * @return array Photo list
	 */
	public function getPhotos(int $id): array {
		$db = new ODB();
		$sql = "SELECT * FROM `photo` WHERE `id_user` = ?";
		$db->query($sql, [$id]);

		$photos = [];
		while ($res=$db->next()){
			$photo = new Photo();
			$photo->update($res);

			array_push($photos, $photo);
		}

		$this->log->debug('Photos: '.count($photos));
		return $photos;
	}
}
