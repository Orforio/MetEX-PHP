<div class="movements index">
	<h2><?php echo __('Movements'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('up_station_id'); ?></th>
			<th><?php echo $this->Paginator->sort('down_station_id'); ?></th>
			<th><?php echo $this->Paginator->sort('up_allowed'); ?></th>
			<th><?php echo $this->Paginator->sort('down_allowed'); ?></th>
			<th><?php echo $this->Paginator->sort('length'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($movements as $movement): ?>
	<tr>
		<td><?php echo h($movement['Movement']['id']); ?>&nbsp;</td>
		<td><?php echo h($movement['UpStation']['name']); ?>&nbsp;</td>
		<td><?php echo h($movement['DownStation']['name']); ?>&nbsp;</td>
		<td><?php echo h($movement['Movement']['up_allowed']); ?>&nbsp;</td>
		<td><?php echo h($movement['Movement']['down_allowed']); ?>&nbsp;</td>
		<td><?php echo h($movement['Movement']['length']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $movement['Movement']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $movement['Movement']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $movement['Movement']['id']), null, __('Are you sure you want to delete # %s?', $movement['Movement']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Movement'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
	</ul>
</div>
