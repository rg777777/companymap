
<?php $view->extend('AppBundle::base.html.php'); ?>
<?php
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
$securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $User_aut = true;
        }else {
            $User_aut = false;
        }

if(isset($User_aut) && $User_aut){
    ?>

    <a href="<?php $view['router']->generate('logout'); ?>">Logout</a>
    <?php
} else {
    ?>
    <div>

        <form action="<?php echo $view['router']->generate('login_check') ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

            <label for="password">Password:</label>
            <input type="password" id="password" name="_password" />

            <input type="hidden" name="_target_path" value="/login" />

            <button type="submit">login</button>
        </form>

    </div>

    <div>

    <?php if (isset($view['form']) && $view['form']){ 
        echo $view['form']->start($form); 
        echo $view['form']->widget($form); 
        echo $view['form']->end($form); 
    } ?>

</div>
<?php } ?>
</body> 
</html>