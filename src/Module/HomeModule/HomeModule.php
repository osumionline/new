<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Module\HomeModule;

use Osumi\OsumiFramework\Routing\OModule;

/**
 * Sections of the web site
 */
#[OModule(
	type: 'html',
	actions: ['Start', 'User', 'Filter']
)]
class HomeModule {}