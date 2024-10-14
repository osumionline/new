<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Layout\DefaultLayoutComponent;
use Osumi\OsumiFramework\App\Module\Home\Filter\FilterComponent;
use Osumi\OsumiFramework\App\Module\Home\Start\StartComponent;
use Osumi\OsumiFramework\App\Module\Home\User\UserComponent;
use Osumi\OsumiFramework\App\Filter\LoginFilter;
use Osumi\OsumiFramework\App\Filter\UserFilter;

ORoute::layout(DefaultLayoutComponent::class, function() {
  ORoute::get('/filter',   FilterComponent::class, [LoginFilter::class, UserFilter::class]);
  ORoute::get('/',         StartComponent::class);
  ORoute::get('/user/:id', UserComponent::class);
});
