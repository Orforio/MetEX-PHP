<div class="jumbotron">
	<div class="container">
		<h1>Add Image</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		<?php
			echo $this->Form->create('Image', array(
			'class' => 'form-horizontal',
			'role' => 'form',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'div' => array('class' => 'form-group'),
				'class' => array('form-control'),
				'label' => array('class' => 'col-xs-2 control-label'),
				'between' => '<div class="col-xs-4">',
				'after' => '</div>',
				'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
			))); ?>
		<?php
			echo $this->Form->input('station_id');
			echo $this->Form->input('place_id');
			echo $this->Form->input('filename');
			echo $this->Form->input('title');
			echo $this->Form->input('alt');
		?>
		<?php
			echo $this->Form->end(array(
				'label' => 'Submit',
				'class' => 'btn btn-primary'
			)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Actions</h2>
			<ul>
				<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>
