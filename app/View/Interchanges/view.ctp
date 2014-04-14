<div class="interchanges view">
<h2><?php echo __('Interchange'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($interchange['Interchange']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($interchange['Interchange']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Interchange'), array('action' => 'edit', $interchange['Interchange']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Interchange'), array('action' => 'delete', $interchange['Interchange']['id']), null, __('Are you sure you want to delete # %s?', $interchange['Interchange']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interchanges'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interchange'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stations'); ?></h3>
	<?php if (!empty($interchange['Station'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Line Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Interchange Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($interchange['Station'] as $station): ?>
		<tr>
			<td><?php echo $station['id']; ?></td>
			<td><?php echo $station['name']; ?></td>
			<td><?php echo $station['line_id']; ?></td>
			<td><?php echo $station['description']; ?></td>
			<td><?php echo $station['interchange_id']; ?></td>
			<td><?php echo $station['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stations', 'action' => 'view', $station['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stations', 'action' => 'edit', $station['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stations', 'action' => 'delete', $station['id']), null, __('Are you sure you want to delete # %s?', $station['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
