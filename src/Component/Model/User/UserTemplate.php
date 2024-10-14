<?php if (is_null($user)): ?>
null
<?php else: ?>
{
	"id": <?php echo $user->get('id') ?>,
	"user": "<?php echo urlencode($user->get('user')) ?>",
	"pass": "<?php echo urlencode($user->get('pass')) ?>",
	"numPhotos": <?php echo $user->get('num_photos') ?>,
	"score": <?php echo $user->get('score') ?>,
	"active": <?php echo $user->get('active') ? 'true' : 'false' ?>,
	"lastLogin": "<?php echo $user->get('last_login', 'd/m/Y H:i:s') ?>",
	"notes": "<?php echo is_null($user->get('notes')) ? 'null' : urlencode($user->get('notes')) ?>",
	"createdAt": "<?php echo $user->get('created_at', 'd/m/Y H:i:s') ?>",
	"updatedAt": "<?php echo is_null($user->get('updated_at')) ? 'null' : $user->get('updated_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
