<?php $view->extend('AppBundle::base.html.php'); ?>
<div class="container">

<?php echo $view['form']->start($form); ?>
<?php echo $view['form']->widget($form); ?>
<?php echo $view['form']->end($form); ?>

</div>