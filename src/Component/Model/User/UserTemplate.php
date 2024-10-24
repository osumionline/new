<?php if (is_null($user)): ?>
null
<?php else: ?>
{
	"id": <?php echo $user->id ?>,
	"user": "<?php echo urlencode($user->user) ?>",
	"pass": "<?php echo urlencode($user->pass) ?>",
	"numPhotos": <?php echo $user->num_photos ?>,
	"score": <?php echo $user->score ?>,
	"active": <?php echo $user->active ? 'true' : 'false' ?>,
	"lastLogin": "<?php echo $user->get('last_login', 'd/m/Y H:i:s') ?>",
	"notes": "<?php echo is_null($user->notes) ? 'null' : urlencode($user->notes) ?>",
	"createdAt": "<?php echo $user->get('created_at', 'd/m/Y H:i:s') ?>",
	"updatedAt": "<?php echo is_null($user->updated_at) ? 'null' : $user->get('updated_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
