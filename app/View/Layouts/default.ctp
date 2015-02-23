<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = h("MétEX, the Paris Métro virtual tour");
?>
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
		echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1');

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
					<li><?php echo $this->Html->link('stations', array('controller' => 'stations', 'action' => 'index')); ?></li>
				</ul>
			</div>
		</div>
	</nav>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<p class="well well-sm">&copy;2005-2015 Richard Whittaker - Version "Abbesses"</p>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
