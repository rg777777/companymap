<?php $view->extend('AppBundle::base.html.php'); ?>



<div class="container">
<?php

if (isset($message) && $message ){
 echo '<div class="alert alert-success">'. $message.'</div>';
}

if (isset($companyname) &&  $companyname ) {
            echo '<h1>'.$companyname.'</h1>';
        }


if(isset($Staffs)  && $Staffs){ ?>
    <table class="table"><th>Id</th><th>Country</th><th>Staff count</th><th></th>
<?php    
    foreach ($Staffs as $staff) {
        dump($staff);
        echo '<tr>';
        echo '<td>'. $staff->getId().'</td>';
        echo '<td>'. $staff->getcountryid()->getcountryname().'</td>';
        echo '<td>'. $staff->getStaffCount().'</td>';
        echo '<td><a href="'. $view['router']->generate('staff_edit', array('staffid' => $staff->getId(),  'compid' => $compid)) . '"><i class="fa fa-pencil"></i></a>
        <a href="'. $view['router']->generate('staff_remove', array('staffid' => $staff->getId(), 'compid' => $compid)) . '"><i class="fa fa-remove"></i></a>
        </td>';
        echo '</tr>';
    } ?>
    
  </table>

<?php 

} 

?>

<?php $href =  $view['router']->generate('staff_add', array('compid' => $compid)) ?>

<a href = "<?php echo $href; ?>"class="btn btn-primary btn-lg" role="button">Add staff</a>
<a href = "<?php echo $view['router']->generate('company_index') ?>"class="btn btn-primary btn-lg" role="button">back Company</a>

</div>











