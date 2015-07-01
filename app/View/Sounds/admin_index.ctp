<?php $this->assign('title', 'Admin > Sounds'); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Sounds</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('station_id'); ?></th>
					<th><?php echo $this->Paginator->sort('filename'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('length'); ?></th>
					<th class="info">Actions</th>
				</tr>
				<?php foreach ($sounds as $sound): ?>
				<tr>
					<td><?php echo h($sound['Sound']['id']); ?></td>
					<td><?php echo $this->Html->link($sound['Station']['name'], array('controller' => 'stations', 'action' => 'view', $sound['Station']['id'])); ?></td>
					<td><?php echo h($sound['Sound']['filename']); ?></td>
					<td><?php echo h($sound['Sound']['title']); ?></td>
					<td><?php echo h($sound['Sound']['length']); ?></td>					<td class="info">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $sound['Sound']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sound['Sound']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sound['Sound']['id']), null, __('Are you sure you want to delete # %s?', $sound['Sound']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<p><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></p>
			<ul class="list-inline">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('tag' => 'li'));
					echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('tag' => 'li'));
				?>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Actions</h2>
			<ul>
				<li><?php echo $this->Html->link(__('New Sound'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>
