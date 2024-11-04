<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Service;

use Osumi\OsumiFramework\Core\OService;
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
		$photos = Photo::where(['id_user' => $id]);

		$this->log->debug('Photos: '.count($photos));
		return $photos;
	}
}
