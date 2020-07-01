<?php
session_start();
if (isset($_POST['submit'])){
	if(!empty($_SESSION['user_info'])) {
        $msg = "Thank you for the feedback !!";
        $feedback = $_POST['feedback'];
        $user_info=$_SESSION['user_info'];
        $connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect, "foodies") or die("couldn't find database");
        $sql1 = "INSERT INTO FEEDBACK(username,feed) values ('$user_info','$feedback');";
        if(mysqli_query($connect, $sql1))
		{  
			echo '<script type="text/javascript"> alert("'.$msg.'")</script>';
            //echo "<a target='_blank' href='popup.php?id=".$msg."' onclick=\"window.open(this.href, 'popupwindow', //width=400,height=300,scrollbars,resizable');return false;\"><h10>(check status)</h10></a>";
            //echo "<a href=\"#\" onclick=\"window.open('popup.php?value=$msg');\">link</a>";

		}
		else
		{  
			echo "<script type='text/javascript'>alert('Could not submit feedback');</script>";
		} 
    }
else
		echo "<script type='text/javascript'>alert('Please login');</script>";
}
?>


<html>
<head>
    <link rel="stylesheet" href="css/main.css">
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
  font{font-family: cursive;} 
img{width:300; height:200;}
table{height:90%; border-spacing: 20px;}
img{border-color:black;}
body{ 
    -webkit-background-size: cover;
    -moz-background-size: cover;
        padding-top: 40px;
    -o-background-size: cover;
    background-size: cover;}
</style>
    <script>
        function feedchk(){
            var feedback= document.getElementById("feedback");
            if(feedback.value==" " || feedback.value=="")
	{
		alert("Empty feedback!");
		feedback.focus();
		return false;
	}
            return true;
        }
    </script>
    </head>
<body>
    
    <body background="img/b6.png">
<FONT size="5" color="white">
    <?php include("header.php"); ?>
    <form action="feedback.php" name="feedbackform" method="post">
<table cellspacing="10" cellpadding="2" align="center" style="border-spacing: 50px; border-collapse: inherit;">
    <TR class="left">
<TD><FONT size="5" color="WHITE" style="font-weight:600">Help-line :</FONT></TD>
        <TD><FONT size="5" color="WHITE" style="font-weight:600"> 11-22-33 </FONT></TD>
</TR>
    <TR class="left">
<TD><FONT size="5" color="white" style="font-weight:600">Customer-care:</FONT></TD>
        <TD><FONT size="5" color="white" style="font-weight:600"> help_pizzamania@gmail.com </FONT></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="white" style="font-weight:600">Feedback :</FONT></TD>
<TD class="left"><TEXTAREA rows="7" cols="33" wrap="physical" placeholder="Enter your feedback" id="feedback" name="feedback"></TEXTAREA></TD>
</TR>
    <tr>
    <td colspan="3"><input type="submit" name="submit" value="Submit"  class="button" onclick="return feedchk()"/>
    </td>
    </tr>
        </table>
    </form>
        </FONT>
    </body>
    
    </body>
</html>