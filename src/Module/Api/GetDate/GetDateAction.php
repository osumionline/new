<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Api\GetDate;

use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;

class GetDateAction extends OAction {
	public string $date = '';

	/**
	 * Function used to obtain current date
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->date = $this->service['User']->getLastUpdate();
	}
}
