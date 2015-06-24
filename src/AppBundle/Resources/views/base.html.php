<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $view['assets']->getUrl('/css/bootstrap.min.css') ?>" rel="stylesheet" />
<!-- <link href="<?php echo $view['assets']->getUrl('/css/bootstrap-theme.min.css') ?>" rel="stylesheet" /> -->
<link href="<?php echo $view['assets']->getUrl('/css/font-awesome.min.css') ?>" rel="stylesheet" />
<link href="<?php echo $view['assets']->getUrl('/css/base.css') ?>" rel="stylesheet" />
        <title><?php $view['slots']->output('title', 'Application') ?></title>
    </head>
    <body>
        <?php $view['slots']->output('_content'); ?>
    </body>
</html>