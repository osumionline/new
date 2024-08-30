<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\HomeModule\Actions\Filter;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;

#[OModuleAction(
	url: '/filter',
	filters: ['Login', 'User']
)]
class FilterAction extends OAction {
	/**
	 * Test page for filters
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		echo '<pre>';
		var_dump($req);
		echo '</pre>';
	}
}
