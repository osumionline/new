<?php declare(strict_types=1);

namespace Osumi\OsumiFramework\App\Component\Model\User;

use Osumi\OsumiFramework\Core\OComponent;
use Osumi\OsumiFramework\App\Model\User;

class UserComponent extends OComponent {
  public ?User $user = null;
}
