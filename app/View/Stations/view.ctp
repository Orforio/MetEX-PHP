<div class="jumbotron line-<?php echo h($station['Line']['id']); ?>">
	<div class="container">
		<h1><?php echo $this->LineBadge->addLineBadge($station['Line']['name']); ?> <?php echo h($station['Station']['name']); ?></h1>
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
		</div>
		<div class="col-md-4">
			<p><?php echo h($station['Station']['description']); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" id="nav-station-connections">
			<h2>Connections</h2>
			<?php echo $this->Navigation->addConnectionsList($station['Interchange'], $station['Station']['id']); ?>
		</div>
		<div class="col-sm-6" id="nav-station-places">
			<h2>Places</h2>
			<p>Not yet implemented</p>
		</div>
	</div>
</div>
<?php debug($station); ?>