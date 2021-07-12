<?php 

            $user = $_SESSION['login'];
            $query = "SELECT * FROM service_center WHERE `username`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $location =$data['local_govt'];

?>

       <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="dashboard.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                SERVICE CENTER ACCOUNT
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dashboard.php" data-toggle="" aria-expanded="false" data-target="" aria-controls=""><i class="fa fa-fw fa-user-circle"></i>Dashboard<span class=""></span></a>
                            </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-server"></i>Manage Complaints</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pending_complaint.php">Pending Complaints
                                            <?php
                                $rt = mysqli_query($conn ,"SELECT * FROM complaint where status = '0' AND `location` = '$location'");
                                $num1 = mysqli_num_rows($rt);
                                {?>
        
                                            <b class="m-r-14 mdi mdi-label text-secondary"><?php echo htmlentities($num1); ?></b>
                                            <?php } ?>


                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="progress_complaint.php">Complaints in Progress

                                             <?php
                                $rt = mysqli_query($conn ,"SELECT * FROM complaint where status = '1' AND `location` = '$location'");
                                $num2 = mysqli_num_rows($rt);
                                {?>
        
                                            <b class="m-r-14 mdi mdi-label text-primary"><?php echo htmlentities($num2); ?></b>
                                            <?php } ?>
                                            </a>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="closed_complaint.php">Closed Complaints

                                            <?php
                                $rt = mysqli_query($conn ,"SELECT * FROM complaint where status = '2' AND `location` = '$location'");
                                $num3 = mysqli_num_rows($rt);
                                {?>
        
                                            <b class="m-r-14 mdi mdi-label text-info"><?php echo htmlentities($num3); ?></b>
                                            <?php } ?>


                                            </a>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" href="manage_users.php" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-users"></i>Manage Users</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="activity_log.php" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-calendar-check "></i>  Activity Log</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-cog"></i>Account Settings</a>
                                <div id="submenu-7" class="collapse submenu" style=""> 
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="change_password.php">Change Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>