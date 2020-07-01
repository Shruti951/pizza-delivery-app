<?php 
session_start();
if (isset($_POST['submit'])){
	if(!empty($_SESSION['user_info'])) {
        $bill = "\\nOrder placed successfully !!!\\n\\n";
		$qty1=$_POST['qty1'];
        if($qty1 != '0')
            $bill = $bill . "Delux veg : " .$qty1 . " * 180 Rs.\\n";
        $qty2=$_POST['qty2'];
        if($qty2 != '0')
            $bill = $bill."Peppy Paneer : " .$qty2 . " * 160 Rs.\\n";
		$qty3=$_POST['qty3'];
        if($qty3 != '0')
            $bill = $bill. "Onion capsicum : " .$qty3 . " * 90 Rs.\\n";
		$qty4=$_POST['qty4'];
        if($qty4 != '0')
            $bill = $bill. "Veg extravaganza : " .$qty4 . " * 280 Rs.\\n";
		$qty5=$_POST['qty5'];
        if($qty5 != '0')
            $bill = $bill. "Veg lovers : " .$qty5 . " * 350 Rs.\\n";
		$qty6=$_POST['qty6'];
        if($qty6 != '0')
            $bill = $bill. "Hawaiian feast : " .$qty6 . " * 230 Rs.\\n";
		$qty7=$_POST['qty7'];
        if($qty7 != '0')
            $bill = $bill. "Spicy Mexican : " .$qty7 . " * 200 Rs.\\n";
		$qty8=$_POST['qty8'];
        if($qty8 != '0')
            $bill = $bill. "BBQ Paneer : " .$qty8 . " * 220 Rs.\\n";
		$qty9=$_POST['qty9'];
        if($qty9 != '0')
            $bill = $bill. "Olive Pepper : " .$qty9 . " * 270 Rs.\\n";
        
        $disc=$_POST['disc'];
        if($disc == 'APR10')
            $acdisc = '90';
        else if($disc == 'PIZ20')
            $acdisc = '80';
        else if($disc == 'ANN35')
            $acdisc = '65';
        else
            $acdisc='100';
        
        
        
		$user_info=$_SESSION['user_info'];
		$sum=180*$qty1+160*$qty2+90*$qty3+280*$qty4+350*$qty5+230*$qty6+200*$qty7+220*$qty8+270*$qty9;
		$bill="" . $bill . "Net bill is : ".$sum." Rs.\\n";
        $sum=$sum*$acdisc/100;
        $acdisc=100-$acdisc;
        if($acdisc!='0')
              $bill = $bill. "Discount applied : ".$acdisc."%\\n";
          
        $bill = $bill. "Service tax : 6% \\n";
        $sum=$sum*106/100;
        $bill="" . $bill . "Total bill :".$sum." Rs.\\n";
        
        $msg = $bill. "\\nPizza is on its way !!! Please pay in cash after delievery."; 
		$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect, "foodies") or die("couldn't find database");
$sql1="INSERT INTO orders(email,qty1,qty2,qty3,qty4,qty5,qty6,qty7,qty8,qty9)VALUES('$user_info','$qty1','$qty2','$qty3','$qty4','$qty5','$qty6','$qty7','$qty8','$qty9');";
		if(mysqli_query($connect, $sql1))
		{  
			echo '<script type="text/javascript"> alert("'.$msg.'")</script>';
            //echo "<a target='_blank' href='popup.php?id=".$msg."' onclick=\"window.open(this.href, 'popupwindow', //width=400,height=300,scrollbars,resizable');return false;\"><h10>(check status)</h10></a>";
            //echo "<a href=\"#\" onclick=\"window.open('popup.php?value=$msg');\">link</a>";

		}
		else
		{  
			echo "<script type='text/javascript'>alert('Could not place order');</script>";
		} 
	}
	else
		echo "<script type='text/javascript'>alert('Please login');</script>";
}
?>
<html>
<head>
<title>Order</title>
    <link rel="stylesheet" href="css/main.css">
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
  font{color:white; background-color: black;font-family: cursive;}
img{width:300; height:200;}
table{height:90%; border-spacing: 20px;}
img{border-color:black;}
body{ 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    overflow: inherit;
        padding-top: 40px;
    -o-background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
  background-attachment: fixed;}
</style>
<script type="text/javascript">
	function subtractQty(qty){
		if(qty.value - 1 < 0)
			return;
	else
	qty.value--;
	}
	function chk()
	{
		var qty1=document.getElementById("qty1");
		var qty2=document.getElementById("qty2");
		var qty3=document.getElementById("qty3");
		var qty4=document.getElementById("qty4");
		var qty5=document.getElementById("qty5");
		var qty6=document.getElementById("qty6");
		var qty7=document.getElementById("qty7");
		var qty8=document.getElementById("qty8");
		var qty9=document.getElementById("qty9");
        var disc=document.getElementById("disc");
		if((qty1.value=='' && qty2.value=='' && qty3.value=='' && qty4.value=='' &&qty5.value=='' && qty6.value=='' && qty7.value=='' && qty8.value=='' &&qty9.value=='')||(qty1.value=='0' && qty2.value=='0' && qty3.value=='0' && qty4.value=='0' && qty5.value=='0' && qty6.value=='0' && qty7.value=='0' && qty8.value=='0' && qty9.value=='0' ))
		{
			alert("Please select atleast 1 item");
			return false;
		}
        if(disc.value!='' && (disc.value!='APR10' && disc.value!='PIZ20' && disc.value!='ANN35')){
            alert("please enter a valid coupon code ");
            return false;
        }
		return true;	
	}
</script>
</head>
<body background="img/b6.png"> 
<FONT size="5" color="white">
    <?php include("header.php"); ?>
<!--NAV align="right">
<A HREF="index.php">Home</A>&nbsp&nbsp&nbsp
<A HREF="help.php">Help</A>&nbsp&nbsp&nbsp
<!--?php  
if(isset($_SESSION['user_info']))
	echo 'Welcome <A HREF="login.php"> '.$_SESSION['user_info'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';
?>
</FONT></NAV-->
<form action="order.php" name="orderform" method="post">
<table cellspacing="10" cellpadding="2" align="center" style="border-spacing: 50px; border-collapse: inherit;">

<tr><td>
<img src="img/pizza1.jpg" width="200" height="200" border="5"><br/>
<font size="4">Deluxe Veg</font>
&nbsp;&nbsp;<input type='text' name='qty1' id='qty1' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty1").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty1);' value='-'/>
<font size="4">Rs. 180</font>
    
</td>
<td>
<img src="img/pizza2.jpg" width="200" height="200" border="5"><br/>
<font size="4">Peppy Paneer</font>
&nbsp;&nbsp;<input type='text' name='qty2' id='qty2' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0" />
			<input type='button' name='add' onclick='javascript: document.getElementById("qty2").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty2);' value='-'/>
<font size="4">Rs. 160</font>
</td>
    
<td>
<img src="img/pizza3.jpg" width="200" height="200" border="2"><br/>
<font size="4">Onion Capsicum</font>
&nbsp;&nbsp;<input type='text' name='qty3' id='qty3' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty3").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty3);' value='-'/>
<font size="4">Rs. 90</font>
</td>
</tr>
    
<tr>
<td>
<img src="img/pizza4.jpg" width="200" height="200" border="2" ><br/>
<font size="4">Veg Extravaganza</font>
&nbsp;&nbsp;<input type='text' name='qty4' id='qty4' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty4").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty4);' value='-'/>
<font size="4">Rs. 280</font>
</td><td>
<img src="img/pizza5.jpg" width="200" height="200" border="2"><br/>
<font size="4">Veg lovers Pizza</font>
&nbsp;&nbsp;<input type='text' name='qty5' id='qty5' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty5").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty5);' value='-'/>
			<font size="4">Rs. 350</font>
</td>
<td>
<img src="img/pizza6.jpg" width="200" height="200" border="2"><br/>
<font size="4">Hawaiian feast</font>
&nbsp;&nbsp;<input type='text' name='qty6' id='qty6' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty6").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty6);' value='-'/>
<font size="4">Rs. 230</font>
</td>
</tr>
    
<tr>
<td>
<img src="img/pizza7.jpg" width="200" height="200" border="2"><br/>
<font size="4">Spicy Mexican</font>
&nbsp;&nbsp;<input type='text' name='qty7' id='qty7' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty7").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty7);' value='-'/>
<font size="4">Rs. 200</font>
</td><td>
<img src="img/pizza8.jpg" width="200" height="200" border="2"><br/>
<font size="4">BBQ Paneer</font>
&nbsp;&nbsp;<input type='text' name='qty8' id='qty8' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty8").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty8);' value='-'/>
<font size="4">Rs. 220</font>
</td>
<td>
<img src="img/pizza9.jpg" width="200" height="200" border="3"><br/>
<font size="4">Olive Pepper</font>
&nbsp;&nbsp;<input type='text' name='qty9' id='qty9' size="1" maxlength="2" class="qty" style="width: 25px;" value ="0"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("qty9").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty9);' value='-'/>
<font size="4">Rs. 270</font>
</td>
</tr>
<tr></tr><tr><td colspan="3"></td></tr><tr>
    <td colspan="3"><font size="6">Coupon code if any : </font><input type='text' name='disc' id='disc' size="3" maxlength="6" class="qty" style="width: 125px;"/>
    </td>
    </tr><tr>
    <td colspan="3"><input type="submit" name="submit" value="Order now!!!"  class="button" onclick="return chk()"/>
    </td>
    </tr>
</table>
    </form>
    </FONT>
</body>
</html>