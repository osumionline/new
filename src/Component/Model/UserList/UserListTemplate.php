<?php
use Osumi\OsumiFramework\App\Component\Model\User\UserComponent;

foreach ($list as $i => $user) {
  $component = new UserComponent(['user' => $user]);
	echo strval($component);
	if ($i < count($list) - 1) {
		echo ",\n";
	}
}
