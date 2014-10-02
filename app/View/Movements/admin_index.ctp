<div class="jumbotron">
	<div class="container">
		<h1>Movements</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('up_station_id'); ?></th>
					<th><?php echo $this->Paginator->sort('down_station_id'); ?></th>
					<th><?php echo $this->Paginator->sort('up_allowed'); ?></th>
					<th><?php echo $this->Paginator->sort('down_allowed'); ?></th>
					<th><?php echo $this->Paginator->sort('length'); ?></th>
					<th class="info">Actions</th>
				</tr>
				<?php foreach ($movements as $movement): ?>
				<tr>
					<td><?php echo h($movement['Movement']['id']); ?></td>
					<td><?php echo h($movement['UpStation']['name']); ?></td>
					<td><?php echo h($movement['DownStation']['name']); ?></td>
					<td><?php echo h($movement['Movement']['up_allowed']); ?></td>
					<td><?php echo h($movement['Movement']['down_allowed']); ?></td>
					<td><?php echo h($movement['Movement']['length']); ?></td>
					<td class="info">
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
				<li><?php echo $this->Html->link(__('New Movement'), array('action' => 'add')); ?></li>
			</ul>
		</div>
	</div>
</div>
