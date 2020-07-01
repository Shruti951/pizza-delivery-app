<!DOCTYPE html>
<!--
<html>
<head>
<title><!--?php echo "$title" ?></title>
</head>
<body>
<FONT size="4" color="white">
<NAV align="right">
<A HREF="index.php">Home</A><!--&nbsp&nbsp&nbsp-->
<!--A HREF="help.php">Help</A><!--&nbsp&nbsp&nbsp-->
    
<!--?php  
session_start();
if(isset($_SESSION['user_info']))
	echo 'Welcome <A HREF="login.php"> '.$_SESSION['user_info'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';
?>
</NAV>
</FONT>
</body>
</html>
-->


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Pizza Ordering</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/menu.css">
    </head> 
<body >

<nav class="navbar navbar-inverse navbar-fixed-top" style="position:fixed; top:0">
     <div class="nav navba-nav navbar-right">
    <?php
session_start();
if(isset($_SESSION['user_info']))
	echo 'Welcome <A HREF="login.php"> '.$_SESSION['user_info'].'</a>';
else
	echo '<A HREF="register.php">Login        .  </A>';
?>
        </div>
  <div class="container-fluid">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="order.php">Menu</a></li>
        <li><a href="locations.php">Locations</a></li>
        <!--li><a href="">Store Locations</a></li-->
        <li><a href="feedback.php">Contact Us</a></li>
    </ul>
    <!--ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
          </ul>
      </li>
    </ul-->
  </div>
    
   
</nav>
<!--navbar ends-->
    </body>
