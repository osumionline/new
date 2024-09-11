<?php declare(strict_types=1);

use Osumi\OsumiFramework\Routing\OUrl;
use Osumi\OsumiFramework\App\Module\Api\GetDate\GetDateAction;
use Osumi\OsumiFramework\App\Module\Api\GetUser\GetUserAction;
use Osumi\OsumiFramework\App\Module\Api\GetUsers\GetUsersAction;
use Osumi\OsumiFramework\App\Module\Home\Filter\FilterAction;
use Osumi\OsumiFramework\App\Module\Home\Start\StartAction;
use Osumi\OsumiFramework\App\Module\Home\User\UserAction;
use Osumi\OsumiFramework\App\Filter\LoginFilter;
use Osumi\OsumiFramework\App\Filter\UserFilter;
use Osumi\OsumiFramework\App\Service\UserService;
use Osumi\OsumiFramework\App\Service\PhotoService;

$api_urls = [
  [
    'url' => '/getDate',
    'action' => GetDateAction::class,
    'services' => [UserService::class],
    'type' => 'json'
  ],
  [
    'url' => '/getUser/:id',
    'action' => GetUserAction::class,
  	'services' => [UserService::class],
    'type' => 'json'
  ],
  [
    'url' => '/getUsers',
    'action' => GetUsersAction::class,
  	'services' => [UserService::class],
    'type' => 'json'
  ]
];

$home_urls = [
  [
    'url' => '/filter',
    'action' => FilterAction::class,
  	'filters' => [LoginFilter::class, UserFilter::class]
  ],
  [
    'url' => '/',
    'action' => StartAction::class,
  	'services' => [UserService::class],
  	'inlineCSS' => ['start'],
  	'inlineJS' => ['start', 'test']
  ],
  [
    'url' => '/user/:id',
    'action' => UserAction::class,
  	'services' => [UserService::class, PhotoService::class]
  ]
];

$urls = [];
OUrl::addUrls($urls, $api_urls, '/api');
OUrl::addUrls($urls, $home_urls);

return $urls;
