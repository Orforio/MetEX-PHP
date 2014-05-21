<div class="movements form">
<?php echo $this->Form->create('Movement'); ?>
	<fieldset>
		<legend><?php echo __('Edit Movement'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('up_station_id', array('type' => 'select', 'options' => $stations, 'empty' => 'TERMINUS'));
		echo $this->Form->input('down_station_id', array('type' => 'select', 'options' => $stations, 'empty' => 'TERMINUS'));
		echo $this->Form->input('up_allowed');
		echo $this->Form->input('down_allowed');
		echo $this->Form->input('length');
		echo $this->Form->input('Station');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Movement.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Movement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Movements'), array('admin' => false, 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stations'), array('admin' => false, 'controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
	</ul>
</div>
