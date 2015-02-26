<?php $this->assign('title', 'Lines'); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Lines</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="list-group">
			<?php foreach ($lines as $line): ?>
			<a href="<?php echo $this->Html->url(array('controller' => 'lines', 'action' => 'view', $line['Line']['id'])); ?>" class="list-group-item line-<?php echo $line['Line']['id']; ?>">
				<h4><?php echo $this->LineBadge->addLineBadge($line['Line']['name']); ?></h4>
				<p><?php echo $line['Line']['description']; ?></p>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
