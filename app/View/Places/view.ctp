<?php $this->assign('title', $place['Place']['name']); ?>
<div class="jumbotron">
	<div class="container">
		<h1><?php echo h($place['Place']['name']); ?></h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8" id="content-station-photos">
			<?php echo $this->Image->addStationSlideshow($place['Image']); ?>
		</div>
		<div class="col-md-4" id="content-place-description">
			<p><?php echo h($place['Place']['description']); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12" id="nav-place-stations">
			<h2>Nearby stations</h2>
			<?php echo $this->Navigation->addConnectionsList($place, 2); ?>
		</div>
	</div>
</div>
<?php if (Configure::read('debug')) { debug($place); } ?>
