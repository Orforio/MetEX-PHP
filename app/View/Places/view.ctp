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
</div>
<?php if (Configure::read('debug')) { debug($place); } ?>	
<!--	
	
	
	
	
	
				<?php //foreach ($place['Station'] as $station): ?>
				<tr>
					<td><?php //echo $station['id']; ?></td>
					<td><?php //echo $station['name']; ?></td>
					<td><?php //echo $station['line_id']; ?></td>
					<td><?php //echo $station['description']; ?></td>
					<td><?php //echo $station['interchange_id']; ?></td>
					<td><?php //echo $station['active']; ?></td>
					<td class="info">
						<?php //echo $this->Html->link(__('View'), array('controller' => 'stations', 'action' => 'view', $station['id'])); ?>
						<?php //echo $this->Html->link(__('Edit'), array('controller' => 'stations', 'action' => 'edit', $station['id'])); ?>
						<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'stations', 'action' => 'delete', $station['id']), null, __('Are you sure you want to delete # %s?', $station['id'])); ?>
					</td>
				</tr>
				<?php //endforeach; ?>
			</table>
			<?php //endif; ?>
		</div>
	</div>
</div>-->
