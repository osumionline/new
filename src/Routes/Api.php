<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Api\GetDate\GetDateAction;
use Osumi\OsumiFramework\App\Module\Api\GetUser\GetUserAction;
use Osumi\OsumiFramework\App\Module\Api\GetUsers\GetUsersAction;

ORoute::group('/api', 'json', function() {
  ORoute::get('/get-date',     GetDateAction::class);
  ORoute::get('/get-user/:id', GetUserAction::class);
  ORoute::get('/get-users',    GetUsersAction::class);
});
