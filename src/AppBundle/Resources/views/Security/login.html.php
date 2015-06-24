<?php $view->extend('AppBundle::base.html.php'); ?>

<div class="container">
    <?php if ($view['security']->isGranted('IS_AUTHENTICATED_FULLY')){  ?>
    <p></p>
    <p>Username: <?php echo $app->getUser()->getUsername() ?></p>

    <div class="row show-grid">
        <a href="<?php echo $view['router']->generate('logout'); ?>" class="btn btn-primary btn-lg" role="button">Logout</a></br>
    </div>
    <div class="row show-grid">
        <a href="<?php echo $view['router']->generate('company_index'); ?>" class="btn btn-default btn-lg" role="button">View Company</a></br>
    </div>
    <div class="row show-grid">
        <a href="<?php echo $view['router']->generate('company_add'); ?>" class="btn btn-default btn-lg" role="button">Create Company</a>
    </div>
    <?php } else {?>


    <?php if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif ?>

<?php


?>
<div class="input-group input-group-lg col-md-6 col-md-offset-3">   
    <h1>Login</h1>


    <form class="form-horizontal" role="form" action="<?php echo $view['router']->generate('login_check') ?>" method="post">
        <div class='form-group'>       
            <label class="col-sm-3 control-label" for="username">Username:</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="username" name="_username" value="<?php echo $last_username ?>" />
            </div>
        </div>
        <div class='form-group'> 
            <label class="col-sm-3 control-label"  for="password">Password:</label>
            <div class="col-sm-9">
                <input class="form-control" type="password" id="password" name="_password" />
            </div></div>
            <input type="hidden" name="_target_path" value="/login" />

            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary btn-lg" role="button">login</button>
                <a href = "<?php echo $view['router']->generate('account_register'); ?>" class="btn btn-primary btn-lg" role="button">Register</a>
            </div>
            <div class="col-sm-offset-4 col-sm-8">

            </div>
        </form>

    </div>



    


    <?php  }  ?>
</div>
