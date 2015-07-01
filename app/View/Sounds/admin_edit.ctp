<?php $this->assign('title', 'Admin > Sound > Edit > '. $this->data['Sound']['title']); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Edit Sound</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		<?php
			echo $this->Form->create('Sound', array(
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
			echo $this->Form->input('id');
			echo $this->Form->input('station_id', array(
				'empty' => 'None'
			));
			echo $this->Form->input('filename');
			echo $this->Form->input('title');
			echo $this->Form->input('length');
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
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sound.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sound.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Sounds'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?></li>
			</ul>
		</div>
	</div>
</div>
