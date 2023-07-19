
<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url()?>assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Ct
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url()?>assets/profil/<?php echo $this->session->userdata('user')->img ?>" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <?php echo $this->session->userdata('user')->complete_name ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('employee/setting_')?>">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('welcome/logout')?>">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                <?php if($this->session->userdata('user')->role == 'admin' ){ ?>
                    <li>
                    <a href="<?php echo site_url('/')?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('departement/')?>">
                            <i class="material-icons">diversity_3</i>
                            <p>Departement</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('employee/')?>">
                            <i class="material-icons">badge</i>
                            <p>Employee</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user/')?>">
                            <i class="material-icons">contacts</i>
                            <p>User</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('projek/')?>">
                            <i class="material-icons">integration_instructions</i>
                            <p>Projek</p>
                        </a>
                    </li>
                    <?php }else{ ?>
                    <li>
                    <a href="<?php echo site_url('/')?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('projek/')?>">
                            <i class="material-icons">integration_instructions</i>
                            <p>Projek</p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                
            </div>
        </div>