<?php $view->extend('AppBundle::base.html.php'); ?>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<?php if (isset($companyname) &&  $companyname ) {
			echo '<h1>'.$companyname.'</h1>';
		}
		?>

		<?php echo $view['form']->start($form, array('attr' => array(
		'class' => 'form-horizontal'))); ?>
		<div class="form-group">
			<?php echo $view['form']->label($form['country_id'], 'Country', array(
				'label_attr' => array('class' => 'col-sm-3 control-label'),
				)); ?>
				<div class="col-sm-9">
					<?php echo $view['form']->widget($form['country_id']) ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $view['form']->label($form['staff_count'], 'Staff count', array(
					'label_attr' => array('class' => 'col-sm-3 control-label'),
					)) ?>
					<div class="col-sm-9">
						<?php echo $view['form']->widget($form['staff_count']) ?>
					</div>
				</div>
								<div class="col-sm-offset-3 col-sm-9">
					<?php echo $view['form']->end($form) ?>
				</div>
				
			</div>
		</div>