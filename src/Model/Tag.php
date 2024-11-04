<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class Tag extends OModel {
	#[OPK(
		comment: 'Unique Id for each tag'
	)]
	public ?int $id;

	#[OField(
		comment: 'Tag name',
		max: 20,
		nullable: false
	)]
	public ?string $name;

	#[OField(
		comment: 'User Id',
		ref: 'user.id'
	)]
	public ?int $id_user;

	#[OCreatedAt(
		comment: 'Register creation date'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Last date register was modified'
	)]
	public ?string $updated_at;

	/**
	 * Get tag's name
	 */
	public function __toString() {
		return $this->name;
	}
}
