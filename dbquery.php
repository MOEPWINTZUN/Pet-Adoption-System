<?php
 Include('dbconnection.php');

//   $Pet="CREATE TABLE pettb
// (
// PetID varchar(30) NOT NULL Primary Key,
// PetTypeID int,
// PetBreed varchar(30),
// PetQuantity int,
// ArrivalDate varchar(30),
// PetLocation varchar(30),
// PetImage1 varchar(255),
// PetImage2 varchar(255),
// Foreign Key(PetTypeID) References pettypetb(PetTypeID)
// )";
 
// $query=mysqli_query($connect, $Pet);
 
// if ($query)
// {
// 	echo "<p>Pettb created successfully</p>";
// }
// else
// {
// 	echo "'<p>Pettb not created</p>'";
// }

// $donator="CREATE TABLE donatortb
// (
//     DonatorID varchar(30) NOT NULL Primary Key,
//     DonatorName varchar(30),
//     DonatorEmail varchar(30),
//     DonatorPhNo varchar(30),
//     DonatorAddress varchar(30)
// )";

// $query=mysqli_query($connect, $donator);

// if ($query)
// {
//     echo "<p> donatortb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> donatortb Create Unsuccessfully</p>";
// }

// $review="CREATE TABLE reviewtb
// (
//     UserReviewID varchar(30) NOT NULL Primary Key,
//     UserID varchar(30),
//     Review varchar(255),
//     Foreign Key(UserID) References usertb(UserID)
// )";

// $query=mysqli_query($connect, $review);

// if ($query)
// {
//     echo "<p> reviewtb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> reviewtb Create Unsuccessfully</p>";
// }

// $donation="CREATE TABLE donationtb
// (
//     DonationID varchar(10) Not Null Primary Key,
//     DonationStatus varchar(30),
//     DonationFrequency varchar(30),
//     DonationDate varchar(30),
//     DonatorID varchar(30),
//     DonationItems varchar(30),
// 	Descriptions varchar(30),
//     DonationItemsPhoto varchar(255),
// 	Foreign Key(DonatorID) References donatortb(DonatorID)
// )";

// $query=mysqli_query($connect, $donation);

// if ($query)
// {
//     echo "<p> donationtb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> donationtb Create Unsuccessfully</p>";
// }



// $donationdetails="CREATE TABLE donationdetailstb
// (
//     DonationID varchar(10),
//     PetID varchar(30),
//     ItemsQuantity int,
// 	Primary Key(DonationID,PetID),
// 	Foreign Key(DonationID) References donationtb(DonationID),
// 	Foreign Key(PetID) References pettb(PetID)
// )";

// $query=mysqli_query($connect, $donationdetails);

// if ($query)
// {
//     echo "<p> donationdetailstb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> donationdetailstb Create Unsuccessfully</p>";
// }

// $Petinfo="CREATE TABLE Petinfotb
// (
//     PetinfoID varchar(10) Not Null Primary Key,
//     PetName varchar(30),
//     Petage varchar (30),
//     PetGender varchar(30),
//     PetID varchar(30),
//     PetinfoImage1 varchar(255),
//     PetinfoImage2 varchar(255),
//     Pethealth varchar(50),
//     Temperament varchar(50),
// 	Foreign Key(PetID) References pettb(PetID)
	
// )";

// $query=mysqli_query($connect, $Petinfo);

// if ($query)
// {
//     echo "<p> Petinfo Create Successfully</p>";
// }
// else 
// {
//     echo "<p> Petinfo Create Unsuccessfully</p>";
// }
// $staff="CREATE TABLE stafftb
// (
//    StaffID varchar(10) NOT NULL Primary Key,
//    StaffName varchar(30),
//    Position varchar(30),
//    StaffEmail varchar(30),
//    StaffPassword varchar(30),
//    StaffPhNo varchar(30)
// )";
// $query=mysqli_query($connect, $staff);

// if ($query)
// {
//     echo "<p> stafftb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> stafftb Create Unsuccessfully</p>";
// }

// $petype="CREATE TABLE pettypetb
// (
//     PetTypeID int NOT NULL Primary Key Auto_Increment,
//     PetType varchar(30)
// )";

// $query=mysqli_query($connect, $petype);

// if ($query)
// {
//     echo "<p> PetTypetb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> PetTypetb Create Unsuccessfully</p>";
// }

// $customer="CREATE TABLE usertb

// (

// UserID int NOT NULL Primary Key Auto_Increment,

// UserName varchar(30),

// SurName varchar(30), 

// UserEmail varchar(30), 

// UserPassword varchar(30), 

// UserAddress varchar(30),

// UserPhoneNo varchar(30), 

// RegistrationMonth varchar(30),

// Profile varchar(225)

// )";
//  $query=mysqli_query($connect, $customer);
 
// if ($query)
// {
// 	echo "<p>customertb created successfully</p>";
// }
// else

// {
// 	echo "'<p>customertb not created</p>'";
// }

// $adoption="CREATE TABLE adoptiontb 
// (
//     AdoptionID  varchar(10) Not Null Primary Key,
//     UserID varchar(30),
//     AdoptionLocation  varchar(100),
//     AdoptionPhoneNo  varchar(30),
//     AdoptionQty  int,
//     AdoptionFeesTotal int,
//     PaymentType  varchar(80),
// 	   AdoptionStatus  varchar(50),
//     AdoptionDate  date,
// 	Foreign Key(UserID) References usertb(UserID)
// )";

// $query=mysqli_query($connect, $adoption);

// if ($query)
// {
//     echo "<p> adoptiontb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> adoptiontb Create Unsuccessfully</p>";
// }

// $adoptionde="CREATE TABLE adoptiondetailstb 
// (
//     AdoptionID  varchar(10) ,
//     PetID varchar(30),
//     AdoptQuantity int,
//     PetAdoptionFees int,
//     Primary Key(AdoptionID,PetID),
// 	Foreign Key(AdoptionID) References adoptiontb(AdoptionID),
// 	Foreign Key(PetID) References pettb(PetID)
// )";

// $query=mysqli_query($connect, $adoptionde);

// if ($query)
// {
//     echo "<p> adoptiondetailstb Create Successfully</p>";
// }
// else 
// {
//     echo "<p> adoptiondetailstb Create Unsuccessfully</p>";
// }

$Adoptionsupport="CREATE TABLE Adoptionsupporttb
(
    PostAdoptionSupportID varchar(10) Not Null Primary Key,
    AdoptionID varchar(10),
    SupportType varchar(30),
    SupportDate date,
    SupportStatus varchar(30),
	Foreign Key(AdoptionID) References  adoptiontb (AdoptionID)
)";

$query=mysqli_query($connect, $Adoptionsupport);

if ($query)
{
    echo "<p> Adoptionsupport Create Successfully</p>";
}
else 
{
    echo "<p> Adoptionsupport Create Unsuccessfully</p>";
}

?>