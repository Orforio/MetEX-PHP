<div class="jumbotron">
	<div class="container">
		<h1>(<?php echo h($station['Line']['name']); ?>) <?php echo h($station['Station']['name']); ?></h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6">
			<?php echo $this->Navigation->addSequentialNavLink($station['UpMovement'], 'up'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $this->Navigation->addSequentialNavLink($station['DownMovement'], 'down'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8" id="content-station-photos">
			<?php echo $this->Image->addStationSlideshow($station['Image']); ?>
			<?php /* REMOVING PENDING REFACTOR ?>
			<?php if (!empty($station['Image'])): ?>
			<div id="carousel-station" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-station" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-station" data-slide-to="1"></li>
					<li data-target="#carousel-station" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php $slideNumber = 1; ?>
					<?php foreach ($station['Image'] as $image): ?>
					<div class="item<?php if ($slideNumber == 1) { echo ' active'; } ?>">
						<img src="/media/images/<?php echo $image['filename']; ?>" alt="TODO">
					</div>
					<?php $slideNumber++; ?>
					<?php endforeach; ?>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-station" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-station" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
			<?php endif; */?>
		</div>
		<div class="col-md-4">
			<p><?php echo h($station['Station']['description']); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" id="nav-station-connections">
			<h3>Connections</h3>
			<ul>
			<?php // TODO: Remove logic from View ?>
			<?php if (!empty($station['Interchange']['Station'])): ?>
				<?php foreach ($station['Interchange']['Station'] as $interchange): ?>
					<?php if ($interchange['line_id'] != $station['Line']['id']): ?>
				<li><?php echo $this->Html->link($interchange['line_id'] . ": " . $interchange['name'], array('controller' => 'stations', 'action' => 'view', $interchange['id'])); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			</ul>
		</div>
		<div class="col-sm-6" id="nav-station-places">
			<h3>Places</h3>
			<p>Not yet implemented</p>
		</div>
	</div>
</div>



<!--
<div class="stations view">
<h2><?php echo __('Station'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($station['Station']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($station['Station']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Line'); ?></dt>
		<dd>
			<?php echo $this->Html->link($station['Line']['name'], array('controller' => 'lines', 'action' => 'view', $station['Line']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($station['Station']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interchange'); ?></dt>
		<dd>
			<?php echo $this->Html->link($station['Interchange']['name'], array('controller' => 'interchanges', 'action' => 'view', $station['Interchange']['id'])); ?>
			<?php if (!empty($station['Interchange']['Station'])) {
				echo h(' (Line ID(s) ');
					foreach ($station['Interchange']['Station'] as $interchange): 
						if ($interchange['line_id'] != $station['Line']['id']) {
							echo $this->Html->link($interchange['line_id'] . ', ', array('controller' => 'stations', 'action' => 'view', $interchange['id']));
						}
					endforeach;
				echo h(')');
				} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($station['Station']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Up Station(s)'); ?></dt>
		<dd><?php foreach ($station['UpMovement'] as $upMovement):
			if ($upMovement['up_allowed']) {
				echo $this->Html->link($upMovement['UpStation']['name'], array('controller' => 'stations', 'action' => 'view', $upMovement['UpStation']['id']));
			}
			else {
				echo __('Terminus');
			}
			endforeach; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Down Station(s)'); ?></dt>
		<dd><?php foreach ($station['DownMovement'] as $downMovement):
			if ($downMovement['down_allowed']) {
				echo $this->Html->link($downMovement['DownStation']['name'], array('controller' => 'stations', 'action' => 'view', $downMovement['DownStation']['id']));
			}
			else {
				echo __('Terminus');
			}
			endforeach; ?>
			&nbsp;</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Images'); ?></h3>
	<?php if (!empty($station['Image'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Station Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Image'); ?></th>
	</tr>
	<?php foreach ($station['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id']; ?></td>
			<td><?php echo $image['station_id']; ?></td>
			<td><?php echo $image['place_id']; ?></td>
			<td><?php echo $image['filename']; ?></td>
			<td><?php echo $image['title']; ?></td>
			<td><img src="/media/images/<?php echo $image['filename']; ?>" height="187" width="250" /></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('Related Movements'); ?></h3>
	<?php if (!empty($station['Movement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Up Station Id'); ?></th>
		<th><?php echo __('Down Station Id'); ?></th>
		<th><?php echo __('Up Allowed'); ?></th>
		<th><?php echo __('Down Allowed'); ?></th>
		<th><?php echo __('Length'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($station['Movement'] as $movement): ?>
		<tr>
			<td><?php echo $movement['id']; ?></td>
			<td><?php echo $movement['up_station_id']; ?></td>
			<td><?php echo $movement['down_station_id']; ?></td>
			<td><?php echo $movement['up_allowed']; ?></td>
			<td><?php echo $movement['down_allowed']; ?></td>
			<td><?php echo $movement['length']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'movements', 'action' => 'view', $movement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'movements', 'action' => 'edit', $movement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'movements', 'action' => 'delete', $movement['id']), null, __('Are you sure you want to delete # %s?', $movement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
-->
<?php debug($station); ?>