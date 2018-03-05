<div id="dashboard-wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-sgde-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong>Bun venit <?=$user['user_name']?> <?=$_SESSION['id']?></strong>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-sgde-collapse">
            <ul class="nav navbar-nav side-nav metismenu" id="sidebarMenu">    
                <li>
                    <a href="<?=ROOT_NAME?>">Liste</a>
                </li>
                <li>
                    <a href="<?=ROOT_NAME?>index.php?page=add_contact_list"> Adaugă Lista</a>
                </li>
                <!--
                <li>
                    <a href="<?=ROOT_NAME?>index.php?page=contacts">Numere</a>
                </li>
                <li>
                    <a href="<?=ROOT_NAME?>index.php?page=add_contact">Adaugă Numere</a>
                </li>
                -->
                <li>
                    <a href="<?=ROOT_NAME?>index.php?page=send_massages_to_list"><i class="fa fa-fw fa-table"></i> Trimite Mesaje </a>
                </li>
                <?php if($user['user_type'] == 'admin'){ ?>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> Utilizatori <span class="fa arrow"></span></a>
                        <ul class="collapse">
                                <li>
                                        <a href="<?=ROOT_NAME?>/index.php?page=users">Listă Utilizatori</a>
                                </li>
                                <li>
                                        <a href="<?=ROOT_NAME?>/index.php?page=add_user">Adaugă Utilizator</a>
                                </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href="/php/logout.php"><i class="fa fa-fw fa-dashboard"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="dashboard-page-wrapper">
        <div class="container-fluid">
            <div class="content">
