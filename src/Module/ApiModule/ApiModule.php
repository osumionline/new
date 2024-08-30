<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\ApiModule;

use Osumi\OsumiFramework\Routing\OModule;

/**
 * Sample API module
 */
#[OModule(
	type: 'json',
	prefix: '/api',
	actions: ['GetDate', 'GetUser', 'GetUsers']
)]
class ApiModule {}