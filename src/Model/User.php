<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\ORM\OModel;
use Osumi\OsumiFramework\ORM\OPK;
use Osumi\OsumiFramework\ORM\OField;
use Osumi\OsumiFramework\ORM\OCreatedAt;
use Osumi\OsumiFramework\ORM\OUpdatedAt;

class User extends OModel {
	#[OPK(
		comment: 'Unique id for each user'
	)]
	public ?int $id;

	#[OField(
		comment: 'User name',
		nullable: false
	)]
	public ?string $user;

	#[OField(
		comment: 'User password',
		nullable: false,
		max: 100,
		visible: false
	)]
	public ?string $pass;

	#[OField(
		comment: 'Number of photos user has',
		nullable: false,
		default: 0
	)]
	public ?int $num_photos;

	#[OField(
		comment: 'User score',
		nullable: false,
		default: 0
	)]
	public ?float $score;

	#[OField(
		comment: 'User is active 1 or not 0',
		nullable: false,
		default: true
	)]
	public ?bool $active;

	#[OField(
		type: OField::DATE,
		comment: 'Last date user signed in',
		nullable: false
	)]
	public ?string $last_login;

	#[OField(
		type: OField::LONGTEXT,
		comment: 'Notes on the user'
	)]
	public ?string $notes;

	#[OCreatedAt(
		comment: 'Register creation date'
	)]
	public ?string $created_at;

	#[OUpdatedAt(
		comment: 'Last date register was modified'
	)]
	public ?string $updated_at;
}
