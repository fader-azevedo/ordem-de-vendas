<div class="col-md-4">
	<label for="password">Profile(s)</label>
	<div class="d-flex">
		<?php $groupsID = array_column($user_groups, 'id') ?>
		<?php foreach ($groups as $group): ?>
			<?php if (in_array($group->id, $groupsID)): ?>
				<div class="form-group form-check mr-lg-3">
					<input type="checkbox" class="form-check-input" id="profile_<?= $group->id ?>"
						   checked>
					<label class="form-check-label" for="profile_<?= $group->id ?>">
						<?= $group->description ?>
					</label>
				</div>
			<?php else: ?>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="profile_<?= $group->id ?>">
					<label class="form-check-label" for="profile_<?= $group->id ?>">
						<?= $group->description ?>
					</label>
				</div>
			<?php endif; ?>
		<?php endforeach ?>
	</div>
</div>
