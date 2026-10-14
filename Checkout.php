<?php 
session_start();
include('dbconnection.php');
include('Adoption_Cart_Functions.php');
include('AutoID.php');



 if(!isset($_SESSION['CiD']))
 {
 	echo "<script>window.alert(Please Login First)</script>";
 	echo "<script>window.location='Cuslogin.php'</script>";
	exit();
 }
 else
 {
 $customer_ID=$_SESSION['CiD'];
 	$query="SELECT * From  usertb  WHERE UserID='$customer_ID'";
 	$ret=mysqli_query($connect,$query);
 	$row=mysqli_fetch_array($ret);
 }

 if (isset($_POST['btnConfirm'])) 
 {
     $rdoDeliveryType=$_POST['rdoDeliveryType'];
     if( $rdoDeliveryType == 1) 
     {
         $ua=$_POST['txtAddress'];
         $up=$_POST['txtPhone'];
     }

     else
     {
        $CID=$_SESSION['UserID'];
        $select= "SELECT * FROM usertb WHERE UserID='$CID'";
        $query=mysqli_query($connect,$select);
        $data=mysqli_fetch_array($query);

        $ua=$data['UserAddress'];
        $up=$data['UserPhoneNo'];

     }

     $Customer_ID=$_SESSION['CiD'];
     $txtadoptionid=$_POST['txtadoptionid'];
     $txtTotalQuantity=$_POST['txtTotalQuantity'];
     $txtTotalamount=$_POST['txtTotalamount'];
     $rdoPaymentType=$_POST['rdoPaymentType'];
     $Status="Pending";
     $txtadoptionDate=$_POST['txtadoptionDate'];

     $Orderquery="INSERT INTO adoptiontb 
                (AdoptionID, UserID, AdoptionLocation, AdoptionPhoneNo, AdoptionQty, AdoptionFeesTotal, PaymentType, AdoptionStatus, AdoptionDate)
                VALUES
                ('$txtadoptionid', '$Customer_ID','$ua', '$up',  '$txtTotalQuantity','$txtTotalamount', '$rdoPaymentType',  '$Status','$txtadoptionDate')";
    $result=mysqli_query($connect,$Orderquery);


    $size= count($_SESSION['ShoppingCartFunctions']);

    for($i=0; $i < $size ; $i++) 
    { 
       $PetID=$_SESSION['ShoppingCartFunctions'][$i]['PetID'];
       $PetAdoptionFees=$_SESSION['ShoppingCartFunctions'][$i]['PetAdoptionFees'];
       $AdoptQuantity=$_SESSION['ShoppingCartFunctions'][$i]['AdoptQuantity'];


    

    $ODquery = "INSERT INTO adoptiondetailstb 
                ( AdoptionID, PetID, PetAdoptionFees, AdoptQuantity)
                VALUES
                ('$txtadoptionid','$PetID', '$PetAdoptionFees', '$AdoptQuantity')";
    $result=mysqli_query($connect,$ODquery);


    $update= "UPDATE  pettb 
                set PetQuantity=PetQuantity-'$txtTotalQuantity'
                WHERE PetID='$PetID'";
    $updateret=mysqli_query($connect, $update);
}

 if($result)
 {
    unset($_SESSION['ShoppingCartFunctions']);
    echo "<script>window.alert('Checkojut Process Complete')</script>";
     echo "<script>window.location='Cuslogin.php'</script>";

 }
 else
 {
    echo "<p>Something Went Wrong in CheckOut" .mysqli_error($connect) ."</p>";
 }
  }

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="cus.css">
      
     <script type="text/javascript">
        function showPaymentTable() {
            document.getElementById('PaymentTable').style.visibility = "visible";
        }
        function hidePaymentTable() {
            document.getElementById('PaymentTable').style.visibility = "hidden";
        }
        function showAddress() {
            document.getElementById('AddressTable').style.visibility = "visible";
        }
        function hideAddress() {
            document.getElementById('AddressTable').style.visibility = "hidden";
        }
    </script>
</head>
<body >
    <form action="Checkout.php" method="POST">
        <div class="containerrr">
            <!-- Left side: Customer Personal Data -->
            <div class="fieldset-containerrr">
                <fieldset>
                    <legend>(1) Customer Personal Data</legend>
                    <table>
                        <tr>
                            <td>Customer Name</td>
                            <td>: <?php echo isset($row['UserName']) ? $row['UserName'] : 'Not available'; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>: <?php echo $row['UserPhoneNo'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <?php echo $row['UserEmail'] ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>: <?php echo $row['UserAddress'] ?></td>
                        </tr>
                    </table>
                </fieldset>
            </div>

            <!-- Right side: Adoption Information -->
            <div class="fieldset-containerrr">
                <fieldset>
                    <legend>(2) Adoption Information</legend>
                    <table>
                        <tr>
                            <td>Adoption Number</td>
                            <td>:
                                <input type="text" name="txtadoptionid" value="<?php echo AutoID('adoptiontb', 'AdoptionID', 'Ado-', 6) ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>Adoption Date</td>
                            <td>:
                                <input type="text" name="txtadoptionDate" value="<?php echo date('Y-m-d') ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>Adoption Total Fees</td>
                            <td>:
                                <input type="number" name="txtTotalamount" value="<?php echo CalculateTotalAmount() ?>" readonly /> MMK
                            </td>
                        </tr>
                        <tr>
                            <td>Total Quantity</td>
                            <td>:
                                <input type="number" name="txtTotalQuantity" value="<?php echo CalculateTotalQuantity() ?>" readonly /> pcs
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
        </div>

        <div class="containerrr">
            <div class="fieldset-con">
        <fieldset>
            <legend>(3) Payment Section</legend>

            <table>
                <tr>
                    <td>Payment Type<br/>
                        <input type="radio" name="rdoPaymentType" value="MPU" onClick="showPaymentTable()" Required checked/> MPU
                        <input type="radio" name="rdoPaymentType" value="VISA" onclick="showPaymentTable()" Required/> VISA
                        <input type="radio" name="rdoPaymentType" value="COD" onclick="hidePaymentTable()" Required/> Cash on Delivery
                    
                    </td>
                </tr>

                <tr>
                    <td>
                        <table id="PaymentTable" name="PaymentTable">
                            <tr>
                                <td>
                                    Name <small>(as it appearson your card) </small> <br/>
                                    <input type="text" name="txtNameOnCard" placeholder="ex. Mg Mg" Required/><br/>
                                    CardNumber <small>(no dashes or spaces)</small><br/>
                                    <input type="text" name="txtNameOnCard" placeholder="1234567" Required/><br/>
                                    Expiration Date <small>(no dashes or spaces)</small><br/>
                                    <select name="cboMonth" Required>
                                        <option>Janauary</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>Apirl</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>

                                    <select name="cboYear" Required>
                                        <option>Year</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                    </select><br/>
                                    Security Code <small>(3 on Back, Amex 4 on front)</small><br/>
                                    <input type="number" name="txtsecuritycode" placeholder="ex. 123" Required><br/>
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>

        <fieldset class="order">
            <div class="orle">
            <legend>(4) Adoption Delivery Details:</legend>
            <table>
                <tr>
                    <td>
                        Delivery Type<br/>
                        <input type="radio" name="rdoDeliveryType" value="1" onclick="showAddress()" Required checked/> Othders Address

                         <input type="radio" name="rdoDeliveryType" value="2" onclick="hideAddress()" Required /> Same Address
                    </td>
                </tr>


                <tr>
                    <td>
                        <table id="AddressTable" name="AddressTable">
                            <tr>
                                
                                <td>
                                    DeliveryPhone:<br/>
                                    <input type="text" name="txtPhone" placeholder="" Required><br/>
                                    DeliverAddress:<br/>
                                    <textarea name="txtAddress" Required></textarea>

                                    
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        
                    
                        <hr/>
                        
                        <input type="submit" name="btnConfirm" value="Confirm Adoption" class="checkout-btn"/>
                    </td>
                </tr>
            </table>

        </div>
</fieldset>
        </div>
    </div>
        <fieldset class="summ">
            
            <legend>(5)Adoption Summary </legend>

            <?php   
                if (!isset($_SESSION['ShoppingCartFunctions'])) 
                {
                    echo "<p>Adoption Cart is Empty</p>";
                    echo "<a href='Pet.php'>Continue Shopping</a>";
                }
                else
                {

                 ?>
<div class="cart-container">
        <div class="cart-items">
            <?php
            $size = count($_SESSION['ShoppingCartFunctions']);
            for ($i = 0; $i < $size; $i++) {
                $PetImage1 = $_SESSION['ShoppingCartFunctions'][$i]['PetImage1'];
                $PetID = $_SESSION['ShoppingCartFunctions'][$i]['PetID'];
                $PetBreed = $_SESSION['ShoppingCartFunctions'][$i]['PetBreed'];
                $PetAdoptionFees = $_SESSION['ShoppingCartFunctions'][$i]['PetAdoptionFees'];
                $AdoptQty = $_SESSION['ShoppingCartFunctions'][$i]['AdoptQuantity'];
                $subTotal = $PetAdoptionFees * $AdoptQty;
                ?>
                <div class="cart-item">
                    <div class="cart-item-image">
                        <img src="<?php echo $PetImage1; ?>" width="100" height="100" alt="Pet Image">
                    </div>
                    <div class="cart-item-details">
                         <p>PetBreed <br> <br> <span> <?php echo $PetBreed; ?></span></p>
                        <p>Pet ID <br> <br> <span><?php echo $PetID; ?></span></p>
                        <p>Adoption Fees <br> <br> <span>$<?php echo $PetAdoptionFees; ?></span></p>
                        <p>Quantity <br> <br> <span><?php echo $AdoptQty; ?> </span></p>
                        <p>GrandTotal <br> <br> <span> $<?php echo $subTotal; ?></span> </p>
                        <a href="Adoption_Cart.php?Pid=<?php echo $PetID; ?>&Action=Remove" class="remove-btn">Remove</a>
                    </div>

                </div>
            <?php } ?>
        </div>
                        
                        
                     </tr>


                </table>
                <div class="cart-summary">
            <h2>Cart Totals</h2>
            <p>Subtotal: <b>$<?php echo CalculateTotalAmount(); ?></b></p>
            <hr>
            <a href="Adoption_Cart.php?Action=ClearAll" class="clear-btn">Clear Cart</a>
            <a href="Pet.php" class="continue-btn">Continue Adopting</a>
        
        </div>
    </div>
    <?php
    }
    ?>
        </fieldset>
</form>
  </body>
 </html>






