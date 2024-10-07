<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\Routes;

use Osumi\OsumiFramework\Routing\ORoute;
use Osumi\OsumiFramework\App\Module\Home\Filter\FilterAction;
use Osumi\OsumiFramework\App\Module\Home\Start\StartAction;
use Osumi\OsumiFramework\App\Module\Home\User\UserAction;
use Osumi\OsumiFramework\App\Filter\LoginFilter;
use Osumi\OsumiFramework\App\Filter\UserFilter;

ORoute::get('/filter',   FilterAction::class, [LoginFilter::class, UserFilter::class]);
ORoute::get('/user/:id', UserAction::class);
ORoute::get(url: '/',
            action: StartAction::class,
            options: [
              'inline_css' => ['start'],
            	'inline_js' => ['start', 'test']
            ]
          );
