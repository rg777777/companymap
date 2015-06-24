
<?php $view->extend('AppBundle::base.html.php'); ?>



<div class="container">
<?php

if (isset($message) && $message ){
 echo '<div class="alert alert-success">'. $message.'</div>';
}


if(isset($Countries)  && $Countries){ ?>
    <table class="table"><th>Id</th><th>Name</th><th></th>
<?php    
    foreach ($Countries as $Country) {
        echo '<tr>';
        echo '<td>'. $Country->getId().'</td>';
        echo '<td>'. $Country->getCountryname().'</td>';
        echo '<td></td>';
        echo '</tr>';
    } ?>
    
  </table>
<?php

}






?>

<a href = "<?php echo $view['router']->generate('country_add') ?>"class="btn btn-primary btn-lg" role="button">Add Country</a>

</div>


