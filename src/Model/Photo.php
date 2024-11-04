<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;
use Osumi\OsumiFramework\ORM\ODB;

class Photo extends OModel {
	#[OPK(
		comment: 'Unique Id for each photo'
	)]
	public ?int $id;

	#[OField(
		comment: 'User Id',
		ref: 'user.id'
	)]
	public ?int $id_user;

	#[OField(
		comment: 'Photo extension',
		max: 5,
		nullable: false,
		default: ''
	)]
	public ?string $ext;

	#[OField(
		comment: 'alt text for the photo',
		max: 100,
		nullable: false
	)]
	public ?string $alt;

	#[OField(
		comment: 'URL for the photo',
		max: 100,
		nullable: false
	)]
	public ?string $url;

	#[OCreatedAt(
		comment: 'Register creation date'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Last date register was modified'
	)]
	public ?string $updated_at;

	/**
	 * Get photo's full name
	 */
	public function __toString() {
		return $this->id . '.' . $this->ext;
	}

	private ?array $tags = null;

	/**
	 * Save photo's tag list
	 *
	 * @param array $tags Tag list
	 *
	 * @return void
	 */
	public function setTags(array $tags): void {
		$this->tags = $tags;
	}

	/**
	 * Get photo's tag list
	 *
	 * @return array Photo's tag list
	 */
	public function getTags(): array {
		if (is_null($this->tags)) {
			$this->loadTags();
		}
		return $this->tags;
	}

	/**
	 * Load photo's tag list
	 *
	 * @return void
	 */
	private function loadTags(): void {
		$db = new ODB();
		$list = [];
		$sql = "SELECT * FROM `tag` WHERE `id` IN (SELECT `id_tag` FROM `photo_tag` WHERE `id_photo` = ?)";
		$db->query($sql, [$this->id]);

		while ($res = $db->next()) {
			$list[] = Tag::from($res);
		}

		$this->tags = $list;
	}
}
