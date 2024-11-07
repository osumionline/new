<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;

ORoute::view('/views/without-layout', 'Module/Views/WithoutLayout.html');
ORoute::view('/views/with-layout',    'Module/Views/WithLayout.html', [], DefaultLayoutComponent::class);
