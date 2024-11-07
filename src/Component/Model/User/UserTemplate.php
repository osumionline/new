<?php if (is_null($user)): ?>
null
<?php else: ?>
{
	"id": {{ user.id }},
	"user": {{ user.user | string }},
	"pass": {{ user.pass | string }},
	"numPhotos": {{ user.num_photos }},
	"score": {{ user.score | number }},
	"active": {{ user.active | bool }},
	"lastLogin": {{ user.last_login | date("d/m/Y H:i:s") }},
	"notes": {{ user.notes | string}},
	"createdAt": {{ user.created_at | date }},
	"updatedAt": {{ user.updated_at | date }}
}
<?php endif ?>
