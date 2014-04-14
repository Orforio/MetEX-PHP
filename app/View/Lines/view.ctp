<div class="lines view">
<h2><?php echo __('Line'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($line['Line']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($line['Line']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colour'); ?></dt>
		<dd>
			<?php echo h($line['Line']['colour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo $this->Html->link($line['Stock']['name'], array('controller' => 'stocks', 'action' => 'view', $line['Stock']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($line['Line']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($line['Line']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Line'), array('action' => 'edit', $line['Line']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Line'), array('action' => 'delete', $line['Line']['id']), null, __('Are you sure you want to delete # %s?', $line['Line']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stations'); ?></h3>
	<?php if (!empty($line['Station'])): ?>
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
	<?php foreach ($line['Station'] as $station): ?>
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
