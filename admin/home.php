   <?php  include ("../init.php");
   $user_check=$_SESSION['login_user'];
   if($user_check != 1)
   {
    header("Location: index.php"); // Redirecting To Home Page
   }
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Facebook control | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <link href="../assets/admin/css/style-responsive.css" rel="stylesheet" />
       <link href="../assets/admin/css/daterangepicker-bs3.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="home.php" class="logo" style="color: blue;" >Facebook<span>control panel</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
     
    
          </ul>
          </div>
           <?php $admin = $users->get_admin(); ?>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                     	<img src="../assets/admin/images/<?php echo $admin['pic']; ?>" width="36px" alt="" />
                          <span class="username"><?php echo $admin['name']; ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                       
                          <li><a href="profile.php"><i class="fa fa-cog"></i> Edit Profile Settings</a></li>
                          
                          <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a  class="active" href="home.php">
                          <i class="fa fa-users"></i>
                          <span>Users</span>
                      </a>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
           
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
                     					<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>F-Name</th>
                <th>L-Name</th>
                <th>Gender</th>
                <th>Country</th>
                 <th>Age</th>
                  <th>Language</th>
                 <th>Friends Count</th>
                  <th>Twitter Followers </th>
                   <th>Istagram Followers</th>
                    <th>Linkedin Followers</th>
                   <th>Last Login</th>
            </tr>
        </thead> 
        <tbody>
         <?php 
        
          $users = ($users->get_users());
        
         foreach ($users as $user)
         { ?>
                   <tr>
                    <td><img  class="img-circle" src="https://graph.facebook.com/<?php echo $user['user_id']; ?>/picture" /></td>
                <td><?php echo $user['user_name']; ?></td>
                <td><?php echo $user['user_email']; ?></td>
                <td><?php echo $user['user_fname']; ?></td>
                <td><?php echo $user['user_lname']; ?></td>
                <td><?php echo $user['user_gender']; ?></td>
                <td><?php echo $user['user_country']; ?></td>
                  <td><?php echo $user['user_age']; ?></td>
                      <td><?php echo $user['lang']; ?></td>
                 <td><?php echo $user['user_friendscount']; ?></td>
                  <td><?php echo $user['twitter_followers']; ?></td>
                   <td><?php echo $user['instagram_followers']; ?></td>
                    <td><?php echo $user['linkedin_followers']; ?></td>
                   <td><?php echo $user['last_login_date']; ?></td>
            </tr>
         <?php } ?>
     
        
            </tbody>
            </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; Facebook Control panel.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/admin/js/jquery.js"></script>
     <script src="../assets/admin/js/jquery-1.10.2.js"></script>
    <script src="../assets/admin/js/bootstrap.min.js"></script>
     <script src="../assets/admin/js/streaming-mustache.js" type="text/javascript"></script><!-- Streaming Table -->
<script src="../assets/admin/js/stream_table.js" type="text/javascript"></script><!-- Streaming Table -->
    <script class="include" type="text/javascript" src="../assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/admin/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/admin/js/respond.min.js" ></script>
   


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    	<script>
$(document).ready(function() {
    $('#example').dataTable( {
          "bFilter" : true, 
        "bJQueryUI" : true, 
        "sPaginationType" : "full_numbers", 
        "bPaginate": true,
        "bInfo": true
    
    } );
} );
</script>



  </body>
</html>

