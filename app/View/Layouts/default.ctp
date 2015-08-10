<?php $cakeDescription = h("MétEX, the Paris Métro virtual tour"); ?>
<?php echo $this->Html->docType('html5'); ?>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1'));

		echo $this->Html->css('styles');

		echo $this->Html->script(array('jquery', 'bootstrap'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo $this->Html->link('mét<strong>ex</strong>', '/', array('class' => 'navbar-brand', 'escape' => false)); ?>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link('lines', array('controller' => 'lines', 'action' => 'index')); ?></li>
					<!--<li><?php echo $this->Html->link('stations', array('controller' => 'stations', 'action' => 'index')); ?></li>-->
				</ul>
			</div>
		</div>
	</nav>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<p class="well well-sm text-center"><small>&copy;2005-2015 Richard Whittaker - Milestone <em>Abbesses</em> - <?php echo $this->Html->link('Please report any bugs on GitHub', 'https://github.com/PkerUNO/MetEX/issues', array('confirm' => 'Please report only bugs and suggestions to do with the workings of the site and not the content. I am aware the line data and photos are out of date, these will be updated in a future version.')); ?></small></p>
			</div>
		</div>
	</div>
	<?php if (Configure::read('debug')) { echo $this->element('sql_dump'); } ?>
</body>
</html>
