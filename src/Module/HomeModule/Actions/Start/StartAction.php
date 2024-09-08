<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\HomeModule\Actions\Start;

use Osumi\OsumiFramework\Routing\OModuleAction;
use Osumi\OsumiFramework\Routing\OAction;
use Osumi\OsumiFramework\Web\ORequest;
use Osumi\OsumiFramework\App\Component\Home\Users\UsersComponent;
use Osumi\OsumiFramework\Plugins\OToken;
use Osumi\OsumiFramework\Plugins\OBrowser;
use Osumi\OsumiFramework\Plugins\OCrypt;
use Osumi\OsumiFramework\Plugins\OImage;

#[OModuleAction(
	url: '/',
	services: ['User'],
	inlineCSS: ['start'],
	inlineJS: ['start', 'test']
)]
class StartAction extends OAction {
	public string $date = '';
	public ?UsersComponent $users;
	public string $token = '';
	public string $encrypted_text = '';
	public string $decrypted_text = '';

	/**
	 * Start page
	 *
	 * @param ORequest $req Request object with method, headers, parameters and filters used
	 * @return void
	 */
	public function run(ORequest $req):void {
		$this->date = $this->service['User']->getLastUpdate();

		$this->users = new UsersComponent(['users' => $this->service['User']->getUsers()]);

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
