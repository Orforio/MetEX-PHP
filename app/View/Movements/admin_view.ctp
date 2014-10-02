<div class="jumbotron">
	<div class="container">
		<h1>View Movement</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table" id="movement-view-row">
				<tr>
					<th>ID</th>
					<th>Up Station ID</th>
					<th>Down Station ID</th>
					<th>Up Allowed?</th>
					<th>Down Allowed?</th>
					<th>Length</th>
				</tr>
				<tr>
					<td><?php echo h($movement['Movement']['id']); ?></td>
					<td><?php echo h($movement['UpStation']['name']); ?></td>
					<td><?php echo h($movement['DownStation']['name']); ?></td>
					<td><?php echo h($movement['Movement']['up_allowed']); ?></td>
					<td><?php echo h($movement['Movement']['down_allowed']); ?></td>
					<td><?php echo h($movement['Movement']['length']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Actions</h2>
			<ul>
				<li><?php echo $this->Html->link(__('Edit Movement'), array('action' => 'edit', $movement['Movement']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Movement'), array('action' => 'delete', $movement['Movement']['id']), null, __('Are you sure you want to delete # %s?', $movement['Movement']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Movements'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Movement'), array('action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Related Stations</h2>
			<?php if (!empty($movement['Station'])): ?>
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Line ID</th>
					<th>Description</th>
					<th>Interchange ID</th>
					<th>Active?</th>
					<th class="info">Actions</th>
				</tr>
				<?php foreach ($movement['Station'] as $station): ?>
				<tr>
					<td><?php echo $station['id']; ?></td>
					<td><?php echo $station['name']; ?></td>
					<td><?php echo $station['line_id']; ?></td>
					<td><?php echo $station['description']; ?></td>
					<td><?php echo $station['interchange_id']; ?></td>
					<td><?php echo $station['active']; ?></td>
					<td class="info">
						<?php echo $this->Html->link(__('View'), array('controller' => 'stations', 'action' => 'view', $station['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'stations', 'action' => 'edit', $station['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stations', 'action' => 'delete', $station['id']), null, __('Are you sure you want to delete # %s?', $station['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		</div>
	</div>
</div>