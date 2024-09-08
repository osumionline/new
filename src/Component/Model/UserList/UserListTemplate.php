<?php
use Osumi\OsumiFramework\App\Component\Model\User\UserComponent;

foreach ($values['list'] as $i => $User) {
  $component = new UserComponent([ 'User' => $User ]);
	echo strval($component);
	if ($i<count($values['list'])-1) {
		echo ",\n";
	}
}
