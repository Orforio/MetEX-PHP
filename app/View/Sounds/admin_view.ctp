<?php $this->assign('title', 'Admin > Sound > View > '. $this->data['Sound']['title']); ?>
<div class="jumbotron">
	<div class="container">
		<h1>View Sound</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<table class="table" id="movement-view-row">
				<tr>
					<th>ID</th>
					<th>Station</th>
					<th>Filename</th>
					<th>Title</th>
					<th>Length</th>
				</tr>
				<tr>
					<td><?php echo h($sound['Sound']['id']); ?></td>
					<td><?php echo h($sound['Sound']['station_id']); ?></td>
					<td><?php echo h($sound['Sound']['filename']); ?></td>
					<td><?php echo h($sound['Sound']['title']); ?></td>
					<td><?php echo h($sound['Sound']['length']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Actions</h2>
			<ul>
				<li><?php echo $this->Html->link(__('Edit Sound'), array('action' => 'edit', $sound['Sound']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sound'), array('action' => 'delete', $sound['Sound']['id']), null, __('Are you sure you want to delete # %s?', $sound['Sound']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sounds'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sound'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>
