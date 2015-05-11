<?php $this->assign('title', 'Admin > Places > View > '. $place['Place']['name']); ?>
<div class="jumbotron">
	<div class="container">
		<h1>View Place</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
				</tr>
				<tr>
					<td><?php echo h($place['Place']['id']); ?></td>
					<td><?php echo h($place['Place']['name']); ?></td>
					<td><?php echo h($place['Place']['description']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Actions</h2>
			<ul>
				<li><?php echo $this->Html->link(__('Edit Place'), array('action' => 'edit', $place['Place']['id'])); ?></li>
				<li><?php echo $this->Form->postLink(__('Delete Place'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?></li>
				<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Related Images</h2>
			<?php if (!empty($place['Image'])): ?>
			<table class="table">
				<tr>
					<th>Image</th>
					<th>ID</th>
					<th>Station ID</th>
					<th>Place ID</th>
					<th>Filename</th>
					<th>Title</th>
					<th>Alt</th>
					<th class="info">Actions</th>
				</tr>
				<?php foreach ($place['Image'] as $image): ?>
				<tr>
					<td><?php echo $this->Html->image(Configure::read('MetEX.imagepath') . Configure::read('MetEX.stationphotopath') . $image['filename'], array('alt' => $image['alt'], 'class' => 'img-responsive')); // TODO: Spin this off into ImageHelper ?></td>
					<td><?php echo $image['id']; ?></td>
					<td><?php echo $image['station_id']; ?></td>
					<td><?php echo $image['place_id']; ?></td>
					<td><?php echo $image['filename']; ?></td>
					<td><?php echo $image['title']; ?></td>
					<td><?php echo $image['alt']; ?></td>
					<td class="info">
						<?php echo $this->Html->link(__('View'), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'images', 'action' => 'delete', $image['id']), null, __('Are you sure you want to delete # %s?', $image['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Related Stations</h2>
			<?php if (!empty($place['Station'])): ?>
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
				<?php foreach ($place['Station'] as $station): ?>
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
