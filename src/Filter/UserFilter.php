<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Filter;

//use Osumi\OsumiFramework\Plugins\OToken;

class UserFilter {
	/**
	 * Gets user from the token
	 *
	 * @param array $params Parameter array received on the call
	 *
	 * @param array $headers HTTP header array received on the call
	 *
	 * @return array Return filter status (ok / error) and information
	 */
	public static function handle(array $params, array $headers): array {
		/*global $core;

		// Sample header authentication code
		$ret = ['status'=>'error', 'name'=>null];

		$tk = new OToken($core->config->getExtra('secret'));
		if ($tk->checkToken($headers['Authorization'])) {
			$ret['status'] = 'ok';
			$ret['id'] = intval($tk->getParam('id'));
		}
		*/
		$ret = ['status' => 'ok', 'name' => 'User name'];

		return $ret;
	}
}
