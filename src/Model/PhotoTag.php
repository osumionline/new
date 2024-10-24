<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class PhotoTag extends OModel {
	#[OPK(
		comment: 'Photo Id',
		ref: 'photo.id'
	)]
	public ?int $id_photo;

	#[OPK(
		comment: 'Tag Id',
		ref: 'tag.id'
	)]
	public ?int $id_tag;

	#[OCreatedAt(
		comment: 'Register creation date'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Last date register was modified'
	)]
	public ?string $updated_at;
}
