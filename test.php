<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    
<div class="container">

<form method ="post">

    <center>
    <h1>Control super market Page </h1>
    </center>

    Client Name: <br/>
    <input type="text" class="form-control"  value="<?php echo isset($_POST['txtname'])?$_POST['txtname']:'' ?>" name="txtname" placeholder="Enter client Name "/>
    <br/>

    department :<br>
    <select  name="sdept" class="form-control">
    <option value="Electronic   <?php   if(isset($_POST['sdept'])== 'Electronic') {echo'selected';}  ?> " > Electronic </option>
    <option value="Snacks   <?php   if(isset($_POST['sdept'])== 'Snackes') {echo'selected';}  ?> " > Snackes </option>
    <option value="Other   <?php   if(isset($_POST['sdept'])== 'Other') {echo'selected';}  ?> " > other </option>
    </select>
    
      City:<br>
      
      
    <select  name="sdept" class="form-control">
    <option value="  <?php   if(isset($_POST['sdept'])== 'Cairo') {echo'Cairo';} else ''  ?> " > Cairo </option>
    <option value="   <?php   if(isset($_POST['sdept'])== 'Giza') {echo'Giza';}  else '' ?> " > Giza </option>
    <option value="   <?php   if(isset($_POST['sdept'])== 'Other') {echo'Other';}  else '' ?> " > Other </option>
    </select>
    
      
      count of product :<br>
      <input type="number" class="form-control"  value="<?php echo isset($_POST['txtcount'])?$_POST['txtcount']:'' ?>" name="txtcount" placeholder="Enter items no. "/>
      <br/>
      <input class="btn btn-success form-control" type="submit" name="btn" value="Show Inputs For items" style="margin-bottom:20px"/>


      <?php
        if(isset($_POST["btn"]))
    {
           $n=$_POST["txtcount"];
            echo("<table class='table table-border table-striped'>");
            echo("<tr><th colspan='2'>Client Name</th><th colspan='2'> ".$_POST['txtname']."</th></tr>");
            echo("<tr><th colspan='2'>Count of Product</th><th colspan='2'>".$_POST['txtcount']."</th></tr>");
            echo("<tr><th>Pro Name</th><th>Qty</th> <th>Price</th></tr>");

    for($x=1;$x<=$n;$x++)
    {
        echo("<tr><td><input type='text' name='txtsubname$x' placeholder='Enter Product Name' class='form-control'/></td>");
        echo("<td><input type='number' name='txtQnt$x' placeholder='Enter Qnt' class='form-control'/></td>");
        echo("<td><input type='number' name='txtPrice$x' placeholder='Enter Price ' class='form-control'/></td>");
      
    }
   
  
    echo("</table>");
    echo('<input class="btn btn-success form-control" type="submit" name="btnSubTotal" value="Show Sub Total" style="margin-bottom:20px">');

    
    }
   
   
    if(isset($_POST["btnSubTotal"]))
    { 
        $n=$_POST["txtcount"];
      $subTootal=0;$Total=0;$discountPersentege=0;$value=0;$after=0;$net=0;
      echo("<table class='table table-border table-striped'>");
      echo("<tr><th colspan='2'>Client Name</th><th colspan='2'>".$_POST['txtname']." </th></tr>");
      echo("<tr><th colspan='2'>Count of Product</th><th colspan='2'>$n</th></tr>");
      echo("<tr><th>Pro Name</th><th>Qty</th> <th>Price</th><th>subTotal</th></tr>");
      
      for($x=1;$x<=$n;$x++)

        {   $productName=$_POST["txtsubname{$x}"];
            $qnt=$_POST["txtQnt{$x}"];
            $price=$_POST["txtPrice{$x}"];
             $subTootal=$qnt*$price;
             echo("<tr><td> $productName</td><td>$qnt</td><td>$price</td><td> $subTootal</td></tr>"); 
             $Total+= $subTootal;
            }

       
        echo("<tr><th colspan='2'>Total</th><th colspan='2'>$Total </th></tr>");


         if( $Total<500)
         $discountPersentege=0;
         else if ( $Total<1500)
         $discountPersentege=10;
         else if ( $Total<2500)
         $discountPersentege=12;
         else if ( $Total>2500)
         $discountPersentege=15;
         $discountValue= $discountPersentege* $Total/100;
         echo("<tr><th colspan='2'>discountValue</th><th colspan='2'>$discountValue </th></tr>");
         $total_after_discount =$Total-$discountPersentege;
         echo("<tr><th colspan='2'>total_after_discount</th><th colspan='2'>$total_after_discount </th></tr>");
          
         $city=$_POST['sdept'];
         
         
         if($city== "Giza")
         $dilavariValue=30;
         else  if($city== "Cairo")
         $dilavariValue=50; 
         else  if($city== "Other")
         $dilavariValue=40; 
        
            echo("<tr><th colspan='2'>Dilavary Value</th><th colspan='2'>$dilavariValue </th></tr>");
            $net_Tptal=$dilavariValue+ $total_after_discount;
            echo("<tr><th colspan='2'>net Value</th><th colspan='2'> $net_Tptal</th></tr>");

        echo("</table>");

    }
   

    
    
    







?>




</form>




</div>

</body>
</html>

