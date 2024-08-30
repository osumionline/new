<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Model;

use Osumi\OsumiFramework\DB\OModel;
use Osumi\OsumiFramework\DB\OModelGroup;
use Osumi\OsumiFramework\DB\OModelField;

class Tag extends OModel {
	/**
	 * Configures current model object based on data-base table structure
	 */
	function __construct() {
		$model = new OModelGroup(
			new OModelField(
				name: 'id',
				type: OMODEL_PK,
				comment: 'Unique Id for each tag'
			),
			new OModelField(
				name: 'name',
				type: OMODEL_TEXT,
				size: 20,
				nullable: false,
				comment: 'Tag name'
			),
			new OModelField(
				name: 'id_user',
				type: OMODEL_NUM,
				nullable: true,
				default: null,
				comment: 'User Id',
				ref: 'user.id'
			),
			new OModelField(
				name: 'created_at',
				type: OMODEL_CREATED,
				comment: 'Register creation date'
			),
			new OModelField(
				name: 'updated_at',
				type: OMODEL_UPDATED,
				comment: 'Last date register was modified'
			)
		);

		parent::load($model);
	}

	/**
	 * Get tag's name
	 */
	public function __toString() {
		return $this->get('name');
	}
}
