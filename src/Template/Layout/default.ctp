<!DOCTYPE html>
<html lang="en-us">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Nixser : <?= (isset($page_title) ? $page_title : $this->fetch('title')) ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
 
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-modal.css');
        echo $this->Html->css('font-awesome.min.css');
        echo $this->Html->css('backend.css');
        echo $this->Html->css('animate.css');
 
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

    <link rel="shortcut icon" href="ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:600,400,300" />
</head>

<body class="themed">
    <header class="header">
        <a href="index.php" class="logo"><?= $this->Html->image('logo.png') ?></a>

        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="javascript:;" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><!-- <a href="javascript:;"><i class="glyphicon glyphicon-log-out"></i> Sign out</a> -->
                    <?= $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> Sign out',["controller" => "users", "action" => "logout"],['escape' => false]); ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="container">

        <div id="content">
            <div class="wrapper row-offcanvas row-offcanvas-left">
                <?php include("admin_nav.ctp"); ?>
                <aside class="right-side">
                    <?= $this->Flash->render() ?>

                    <div class="row" style="margin:0;">
                        <?= $this->fetch('content') ?>
                    </div>
                </aside>
            </div>
        </div>
        <footer>
            <?php include("admin_footer.ctp"); ?>
        </footer>
    </div>
</body>
</html>
