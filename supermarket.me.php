<html>

<head> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<form method="post" style="padding:10px">
<div >
    <center><h1> Supermarket Orders </h1></center>

    <div class="container">
        Client Name : </br>
        <input type="text" name="txtname" required  class="form-control" placeholder="Enter Client Name" value="<?php echo isset($_POST['txtname'])?$_POST['txtname']:'' ?>"/>
        Department : </br>
        <select name="sdept" class="form-control">
            <option value="Electronic">Electronic</option>
            <option value="Snacks">Snacks</option>
            <option value="Others">Others</option>
        </select>
        
        City:<br/>
        <input type="radio" name="rdcity" value="Cairo" /> Cairo
        <input type="radio" name="rdcity" value="Giza" /> Giza
        <input type="radio" name="rdcity" value="Other" /> Other
        </br>
        Product Name : </br>
        <input type="text" class="form-control" name="txtpname" required placeholder="Enter Product Name" value="<?php echo isset($_POST['txtpname'])?$_POST['txtpname']:'' ?>"/> 
        Product Quantity : </br>
        <input type="text" class="form-control" name="txtqty" required placeholder="Enter Product Quantity" value="<?php echo isset($_POST['txtqty'])?$_POST['txtqty']:'' ?>"/> 
    
        Product Price : </br>
        <input type="text" class="form-control" name="txtprice" required placeholder="Enter Product Price" value="<?php echo isset($_POST['txtprice'])?$_POST['txtprice']:'' ?>"/> 
        </br>


        <input type="submit" name="btncalc" Value="Calaculate Invoice Details" class="btn btn-primary"/>

        <?php
 if(isset($_POST["btncalc"]))
 {include_once "Superclass.me.php" ;

     $d=new SuperClass();
    
     //inputs
     $d->setname($_POST["txtname"]);
     $d->setproname($_POST["txtpname"]);
     $d->setqty($_POST["txtqty"]);
     $d->setprice($_POST["txtprice"]);
     $d->setcity($_POST["rdcity"]);
     $d->setdept($_POST["sdept"]);

     //process

  $total=$d->showTotal();
  $percenteg =$d->Showpercentig($total);
  $value=$d->ShowDiscValue($total,$percenteg);
  $after=$d->ShowAfter($total,$value);
  $delv=$d->ShowDelivery();
  $net=$d->Shownettotal($delv,$after);


  

//output
echo("<table class='table table-border'>");
echo("<tr><td>Total </td><td>".$total."</td></tr>");
echo("<tr><td>Discount % </td><td>".($percenteg*100)."%</td></tr>");
echo("<tr><td>Total After Discount </td><td>".($after)." </td></tr>");
echo("<tr><td>Discount Value </td><td>".($value)." </td></tr>");
echo("<tr><td>Delivery </td><td>".$delv."</td></tr>");
echo("<tr><td>Net Total </td><td>".$net."</td></tr>");
echo("</table>");






 }

?>