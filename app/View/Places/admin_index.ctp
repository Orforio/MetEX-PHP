<?php $this->assign('title', 'Admin > Places'); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Places</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th class="info">Actions</th>
				</tr>
				<?php foreach ($places as $place): ?>
				<tr>
					<td><?php echo h($place['Place']['id']); ?></td>
					<td><?php echo h($place['Place']['name']); ?></td>
					<td><?php echo h($place['Place']['description']); ?></td>
					<td class="info">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $place['Place']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $place['Place']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<p>
			<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>
			</p>
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
				<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>
