<?php $this->assign('title', 'Line ' . $line['Line']['name']); ?>
<div class="jumbotron line-<?php echo h($line['Line']['id']); ?>">
	<div class="container">
		<h1><?php echo $this->LineBadge->addLineBadge($line['Line']['name']); ?> Line <?php echo h($line['Line']['name']); ?></h1>
	</div>
</div>
<div class="container-fluid line-<?php echo h($line['Line']['id']); ?>">
	<div class="row">
		<div class="col-sm-12">
			<p><?php echo h($line['Line']['description']); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="list-group">
			<?php foreach ($line['Station'] as $station): ?>
			<a href="<?php echo $this->Html->url(array('controller' => 'stations', 'action' => 'view', $station['id'])); ?>" class="list-group-item">
				<h4><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?php echo $station['name']; ?></h4>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php if (Configure::read('debug')) { debug($line); } ?>