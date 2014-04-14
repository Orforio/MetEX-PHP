<div class="stations form">
<?php echo $this->Form->create('Station'); ?>
	<fieldset>
		<legend><?php echo __('Add Station'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('line_id');
		echo $this->Form->input('description');
		echo $this->Form->input('interchange_id');
		echo $this->Form->input('active');
		echo $this->Form->input('Movement');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lines'), array('controller' => 'lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line'), array('controller' => 'lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interchanges'), array('controller' => 'interchanges', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interchange'), array('controller' => 'interchanges', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movements'), array('controller' => 'movements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
	</ul>
</div>
