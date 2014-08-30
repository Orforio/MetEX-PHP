<div class="stations view">
<h2><?php echo __('Station'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($station['Station']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($station['Station']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Line'); ?></dt>
		<dd>
			<?php echo $this->Html->link($station['Line']['name'], array('controller' => 'lines', 'action' => 'view', $station['Line']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($station['Station']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interchange'); ?></dt>
		<dd>
			<?php echo $this->Html->link($station['Interchange']['name'], array('controller' => 'interchanges', 'action' => 'view', $station['Interchange']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($station['Station']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Station'), array('action' => 'edit', $station['Station']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Station'), array('action' => 'delete', $station['Station']['id']), null, __('Are you sure you want to delete # %s?', $station['Station']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lines'), array('controller' => 'lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('controller' => 'lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interchanges'), array('controller' => 'interchanges', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interchange'), array('controller' => 'interchanges', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movements'), array('controller' => 'movements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Images'); ?></h3>
	<?php if (!empty($station['Image'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Station Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Image'); ?></th>
	</tr>
	<?php foreach ($station['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id']; ?></td>
			<td><?php echo $image['station_id']; ?></td>
			<td><?php echo $image['place_id']; ?></td>
			<td><?php echo $image['filename']; ?></td>
			<td><?php echo $image['title']; ?></td>
			<td><img src="/media/images/<?php echo $image['filename']; ?>" height="187" width="250" /></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('Related Movements'); ?></h3>
	<?php if (!empty($station['Movement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Up Station Id'); ?></th>
		<th><?php echo __('Down Station Id'); ?></th>
		<th><?php echo __('Up Allowed'); ?></th>
		<th><?php echo __('Down Allowed'); ?></th>
		<th><?php echo __('Length'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($station['Movement'] as $movement): ?>
		<tr>
			<td><?php echo $movement['id']; ?></td>
			<td><?php echo $movement['up_station_id']; ?></td>
			<td><?php echo $movement['down_station_id']; ?></td>
			<td><?php echo $movement['up_allowed']; ?></td>
			<td><?php echo $movement['down_allowed']; ?></td>
			<td><?php echo $movement['length']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'movements', 'action' => 'view', $movement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'movements', 'action' => 'edit', $movement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'movements', 'action' => 'delete', $movement['id']), null, __('Are you sure you want to delete # %s?', $movement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
