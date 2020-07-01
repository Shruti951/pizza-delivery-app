<html>
<head>
    <link rel="stylesheet" href="css/main.css">
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
  font{color:white; background-color: black;}
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
            if(feedback.value==''){
                alert("Feedback can't be empty !");
                return false;
            }
            return true;
        }
    </script>
    </head>
<body>
    
    <body background="table.jpg">
<FONT size="5" color="white">
    <?php include("header.php"); ?>
    <form action="order.php" name="orderform" method="post">
<table cellspacing="10" cellpadding="2" align="center" style="border-spacing: 50px; border-collapse: inherit;">
    <TR class="left">
<TD><FONT size="5" color="WHITE">Help-line :</FONT></TD>
        <TD><FONT size="5" color="WHITE"> 11-22-33 </FONT></TD>
</TR>
    <TR class="left">
<TD><FONT size="5" color="WHITE">Customer-care:</FONT></TD>
        <TD><FONT size="5" color="WHITE"> help_pizzamania@gmail.com </FONT></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Feedback :</FONT></TD>
<TD class="left"><TEXTAREA rows="7" cols="33" wrap="physical" placeholder="Enter your feedback" id="feedback" name="feedback"></TEXTAREA></TD>
</TR>
    <tr>
    <td colspan="3"><input type="submit" name="submit" value="Submit"  class="button" onclick="return chk()"/>
    </td>
    </tr>
        </table>
    </form>
        </FONT>
    </body>
    
    </body>
</html>