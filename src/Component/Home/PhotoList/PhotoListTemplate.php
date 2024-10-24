<?php if (count($list) > 0): ?>
	<ul class="photos">
<?php foreach ($list as $photo): ?>
		<li>
			<a href="<?php echo $photo->url ?>" rel="noreferrer" target="_blank">
				<img src="/photo/<?php echo $photo ?>" alt="<?php echo $photo->alt ?>">
			</a>
			<p>
				Tags: <?php echo implode(', ', $photo->getTags()) ?>
			</p>
		</li>
<?php endforeach ?>
	</ul>
<?php else: ?>
	User doesn't have any photos, yet.
<?php endif ?>
