<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\Home\Start;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\Plugins\OToken;
use Osumi\OsumiFramework\Plugins\OBrowser;
use Osumi\OsumiFramework\Plugins\OCrypt;
use Osumi\OsumiFramework\Plugins\OImage;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Component\Home\UserList\UserListComponent;

class StartComponent extends OComponent {
	private ?UserService $us = null;

	public string $date = '';
	public ?UserListComponent $users;
	public string $token = '';
	public string $encrypted_text = '';
	public string $decrypted_text = '';

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
	public function run(ORequest $req):void {
		$this->date = $this->us->getLastUpdate();

		$this->users = new UserListComponent(['list' => $this->us->getUsers()]);

		$tk = new OToken("1234bf577a76645dbabcdbc379998243ac1c1234");
		$tk->addParam('id', 1);
		$tk->addParam('name', 'Name');
		$tk->addParam('email', 'email@address.com');
		$tk->addParam('exp', time() + (24 * 60 * 60));

		$this->token = $tk->getToken();

		$browser = new OBrowser();
		$browser->setUA( $_SERVER['HTTP_USER_AGENT'] );

		// var_dump($browser->getBrowserData());

		$crypt = new OCrypt('secret_key');
		$this->encrypted_text = $crypt->encrypt('text');
		$this->decrypted_text = $crypt->decrypt('amVBUGpsSmoyNFYxTU1GZnlGMmRwZz09OjorihnigpKsPrN5SND+/t73');

		$image = new OImage();
		$image->load($this->getConfig()->getDir('public').'photo/1.jpg');
		$nueva_ruta = $this->getConfig()->getDir('public').'photo/1.webp';
		if (file_exists($nueva_ruta)) {
			unlink($nueva_ruta);
		}
		//$image->save($nueva_ruta, IMAGETYPE_WEBP, 100, 100);
	}
}
