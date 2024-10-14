<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Api\GetDate\GetDateComponent;
use Osumi\OsumiFramework\App\Module\Api\GetUser\GetUserComponent;
use Osumi\OsumiFramework\App\Module\Api\GetUsers\GetUsersComponent;

ORoute::prefix('/api', function() {
  ORoute::get('/get-date',     GetDateComponent::class);
  ORoute::get('/get-user/:id', GetUserComponent::class);
  ORoute::get('/get-users',    GetUsersComponent::class);
});
