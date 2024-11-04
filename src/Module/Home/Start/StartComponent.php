<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Home\Start;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Component\Home\UserList\UserListComponent;

class StartComponent extends OComponent {
	private ?UserService $us = null;

	public string $date = '';
	public ?UserListComponent $users;

	public function __construct() {
		parent::__construct();
		$this->addInlineCss('start');
		$this->addInlineJs('start');
		$this->addInlineJs('test');

		$this->us = inject(UserService::class);
	}

	/**
	 * Start page
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req): void {
		$this->date = $this->us->getLastUpdate();
		$this->users = new UserListComponent(['list' => $this->us->getUsers()]);
	}
}
