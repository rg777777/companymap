
<?php $view->extend('AppBundle::base.html.php'); ?>



<div class="container">


 <h1>My companies</h1>

<?php

if (isset($message) && $message ){
 echo '<div class="alert alert-success">'. $message.'</div>';
}


if(isset($Companies)  && $Companies){ ?>
    <table class="table"><th>Id</th><th>Name</th><th></th>
<?php    
    foreach ($Companies as $Company) {
        echo '<tr>';
        echo '<td>'. $Company->getId().'</td>';
        echo '<td>'. $Company->getcompanyname().'</td>';
        echo '<td><a href="'. $view['router']->generate('company_edit', array('id' => $Company->getId())) . '"><i class="fa fa-pencil"></i></a>
        <a href="'. $view['router']->generate('company_remove', array('id' => $Company->getId())) . '"><i class="fa fa-remove"></i></a>
        <a href="'. $view['router']->generate('staff_view', array('compid' => $Company->getId())) . '"><i class="fa fa-folder"></i></a>
        <a href="'. $view['router']->generate('staff_add', array('compid' => $Company->getId())) . '"><i class="fa fa-plus"></i></a>
        <a href="'. $view['router']->generate('company_onmap', array('compid' => $Company->getId())) . '"><i class="fa fa-map-marker"></i></a>
        </td>';
        echo '</tr>';
    } ?>
    
  </table>

<?php

}






?>
<a href = "<?php echo $view['router']->generate('company_add') ?>"class="btn btn-primary btn-lg" role="button">Add Company</a>
<a href = "<?php echo $view['router']->generate('logout') ?>"class="btn btn-primary btn-lg" role="button">Logout</a>

</div>


