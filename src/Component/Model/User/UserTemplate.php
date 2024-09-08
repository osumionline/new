<?php if (is_null($values['User'])): ?>
null
<?php else: ?>
{
	"id": <?php echo $values['User']->get('id') ?>,
	"user": "<?php echo urlencode($values['User']->get('user')) ?>",
	"pass": "<?php echo urlencode($values['User']->get('pass')) ?>",
	"numPhotos": <?php echo $values['User']->get('num_photos') ?>,
	"score": <?php echo $values['User']->get('score') ?>,
	"active": <?php echo $values['User']->get('active') ? 'true' : 'false' ?>,
	"lastLogin": "<?php echo $values['User']->get('last_login', 'd/m/Y H:i:s') ?>",
	"notes": "<?php echo is_null($values['User']->get('notes')) ? 'null' : urlencode($values['User']->get('notes')) ?>",
	"createdAt": "<?php echo $values['User']->get('created_at', 'd/m/Y H:i:s') ?>",
	"updatedAt": "<?php echo is_null($values['User']->get('updated_at')) ? 'null' : $values['User']->get('updated_at', 'd/m/Y H:i:s') ?>"
}
<?php endif ?>
