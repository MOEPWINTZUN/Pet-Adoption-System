<?php  

function AddShoppingCart($PetID,$AdoptQty)
{
	include('dbconnection.php');
	echo $query="SELECT * FROM pettb WHERE PetID='$PetID'";
	$result=mysqli_query($connect,$query);
	$count=mysqli_num_rows($result);

	if($count < 1) 
	{
		echo "<p>Pet ID not found.</p>";
		exit();
	}
	$row=mysqli_fetch_array($result);
	$PetBreed=$row['PetBreed'];
	$PetAdoptionFees=$row['PetAdoptionFees'];
	$PetImage1=$row['PetImage1'];

	if($AdoptQty < 1) 
	{
		echo "<script>window.alert('Adopt Quantity Cannot be Zero (0)')</script>";
		echo "<script>window.location='Adoption_Cart.php'</script>";
		exit();
	}

	if(isset($_SESSION['ShoppingCartFunctions'])) 
	{
		$Index=IndexOf($PetID);
		
		if($Index == -1) 
		{
			$size=count($_SESSION['ShoppingCartFunctions']);

			$_SESSION['ShoppingCartFunctions'][$size]['PetID']=$PetID;
			$_SESSION['ShoppingCartFunctions'][$size]['PetBreed']=$PetBreed;
			$_SESSION['ShoppingCartFunctions'][$size]['PetAdoptionFees']=$PetAdoptionFees;
			$_SESSION['ShoppingCartFunctions'][$size]['AdoptQuantity']=$AdoptQty;
			$_SESSION['ShoppingCartFunctions'][$size]['PetImage1']=$PetImage1;
		}
		else
		{
			$_SESSION['ShoppingCartFunctions'][$Index]['AdoptQuantity']+=$AdoptQty;
		}
	}
	else
	{
		$_SESSION['ShoppingCartFunctions']=array(); //Create Session Array

		$_SESSION['ShoppingCartFunctions'][0]['PetID']=$PetID;
		$_SESSION['ShoppingCartFunctions'][0]['PetBreed']=$PetBreed;
		$_SESSION['ShoppingCartFunctions'][0]['PetAdoptionFees']=$PetAdoptionFees;
		$_SESSION['ShoppingCartFunctions'][0]['AdoptQuantity']=$AdoptQty;
		$_SESSION['ShoppingCartFunctions'][0]['PetImage1']=$PetImage1;
	}
	echo "<script>window.location='Adoption_Cart.php'</script>";
}

function RemoveShoppingCart($PetID)
{
	$Index=IndexOf($PetID);
	unset($_SESSION['ShoppingCartFunctions'][$Index]);
	$_SESSION['ShoppingCartFunctions']=array_values($_SESSION['ShoppingCartFunctions']);

	echo "<script>window.location='Adoption_Cart.php'</script>";
}

function ClearShoppingCart()
{	
	unset($_SESSION['ShoppingCartFunctions']);
	echo "<script>window.location='Adoption_Cart.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	$size=count($_SESSION['ShoppingCartFunctions']);

	for($i=0;$i<$size;$i++) 
	{ 
		$PetAdoptionFees=$_SESSION['ShoppingCartFunctions'][$i]['PetAdoptionFees'];
		$AdoptQty=$_SESSION['ShoppingCartFunctions'][$i]['AdoptQuantity'];
		$TotalAmount+=($PetAdoptionFees * $AdoptQty);
	}
	return $TotalAmount;
}

function CalculateTotalQuantity()
{
	$TotalQuantity=0;
	$size=count($_SESSION['ShoppingCartFunctions']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$AdoptQty=$_SESSION['ShoppingCartFunctions'][$i]['AdoptQuantity'];
		$TotalQuantity+=$AdoptQty;
	}
	return $TotalQuantity;
}

function IndexOf($PetID)
{
	if (!isset($_SESSION['ShoppingCartFunctions'])) 
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCartFunctions']);

	if ($size < 1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($PetID == $_SESSION['ShoppingCartFunctions'][$i]['PetID']) 
		{
			return $i;
		}
	}
	return -1;
}

?>