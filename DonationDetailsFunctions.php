<?php 
	
function AddDonation($PetID,$PetQuantity)
{
	 $query="SELECT * FROM pettb WHERE PetID='$PetID'";
	$result=mysqli_query(mysqli_connect('localhost','root','','petadoptdb'),$query);
	$count=mysqli_num_rows($result);

	if($count < 1) 
	{
		echo "<p>Pet ID not found.</p>";
		exit();
	}
	$row=mysqli_fetch_array($result);
	$Petbreed =$row['PetBreed'];
	$Image=$row['PetImage1'];

	if($PetQuantity < 1) 
	{
		echo "<script>window.alert('Donation Quantity Cannot be Zero (0)')</script>";
		echo "<script>window.location='DonationDetails.php'</script>";
		exit();
	}

	if(isset($_SESSION['DonationFunctions'])) 
	{
		$Index=IndexOf($PetID);
		
		if($Index == -1) 
		{
			$size=count($_SESSION['DonationFunctions']);

			$_SESSION['DonationFunctions'][$size]['PetID']=$PetID;
			
			$_SESSION['DonationFunctions'][$size]['PetBreed']=$Petbreed ;
			$_SESSION['DonationFunctions'][$size]['PetQuantity']=$PetQuantity;
			$_SESSION['DonationFunctions'][$size]['PetImage1']=$Image;
		}
		else
		{
			$_SESSION['DonationFunctions'][$Index]['PetQuantity']+=$PetQuantity;
		}
	}
	else
	{
		$_SESSION['DonationFunctions']=array(); //Create Session Array

		$_SESSION['DonationFunctions'][0]['PetID']=$PetID;
	
		$_SESSION['DonationFunctions'][0]['PetBreed']=$Petbreed;
		$_SESSION['DonationFunctions'][0]['PetQuantity']=$PetQuantity;
		$_SESSION['DonationFunctions'][0]['PetImage1']=$Image;
	}
	//echo "<script>window.location='Purchase_Order.php'</script>";
}

function RemovePet($PetID)
{
	$Index=IndexOf($PetID);
	unset($_SESSION['DonationFunctions'][$Index]);
	$_SESSION['DonationFunctions']=array_values($_SESSION['DonationFunctions']);

	echo "<script>window.location='DonationDetails.php'</script>";
}

function ClearAll()
{	
	unset($_SESSION['DonationFunctions']);
	echo "<script>window.location='DonationDetails.php'</script>";
}

// function calculateTotalAmount()
// {
//     $totalAmount = 0;

//     if (isset($_SESSION['PurchaseFunctions']) && is_array($_SESSION['PurchaseFunctions'])) 
//     {
//         $size = count($_SESSION['PurchaseFunctions']);

//         for ($i = 0; $i < $size; $i++) {
//             $purchasePrice = $_SESSION['PurchaseFunctions'][$i]['Purchase_Amount'];
//             $purchaseQty = $_SESSION['PurchaseFunctions'][$i]['Purchase_Quantity'];
//             $totalAmount += ($purchasePrice * $purchaseQty);
//         }
//     }
    
//     return $totalAmount;
// }

// function CalculateTotalAmount()
// {
// 	$TotalAmount=0;

// 	if (isset($_SESSION['DonationFunctions'])) 
// 	{
// 		$size=count($_SESSION['DonationFunctions']);

// 	for($i=0;$i<$size;$i++) 
// 	{ 
// 		$PurchasePrice=$_SESSION['PurchaseFunctions'][$i]['Purchase_Price'];
// 		$PurchaseQty=$_SESSION['PurchaseFunctions'][$i]['Quantity'];
// 		$TotalAmount+=($PurchasePrice * $PurchaseQty);
// 	}
// 	return $TotalAmount;

// 	}

// 	else 
// 	{
// 		echo "<script>window.alert('Error in Functions')</script>";

// 	}



// }

	


function CalculateTotalQuantity()
{
	$TotalQuantity=0;
	$size=count($_SESSION['DonationFunctions']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$PetQuantity=$_SESSION['DonationFunctions'][$i]['PetQuantity'];
		$TotalQuantity+=$PetQuantity;
	}
	return $TotalQuantity;
}

// function CalculateVAT()
// {
// 	$VAT=0;
// 	$VAT=CalculateTotalAmount() * 0.05;

// 	return $VAT;
// }

function IndexOf($PetID)
{
	if (!isset($_SESSION['DonationFunctions'])) 
	{
		return -1;
	}

	$size=count($_SESSION['DonationFunctions']);

	if ($size < 1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($PetID == $_SESSION['DonationFunctions'][$i]['PetID']) 
		{
			return $i;
		}
	}
	return -1;
}

?>