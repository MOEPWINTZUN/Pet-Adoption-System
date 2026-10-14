<?php 
session_start();
include('dbconnection.php');
if (!isset($_SESSION['SID'])) {
    echo "<script>window.alert('Please Login First!')</script>";
    echo "<script>window.location='stafflogin.php'</script>";
}
 

?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<title></title>
</head>
<title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>
            <span class="logo_name"><i class="fa-solid fa-dog"></i>KIRORO</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="AddPetType.php">
                    <i class="fa-solid fa-paw"></i>
                    <span class="link-name">AddPetType</span>
                </a></li>
                <li><a href="Petinfo.php">
                    <i class="fa-solid fa-dog"></i>
                    <span class="link-name">PetInfo</span>
                </a></li>
                <li><a href="AdoptionSupport.php">
                    <i class="fa-solid fa-bell-concierge"></i>
                    <span class="link-name">AdoptionSupport</span>
                </a></li>

                <li><a href="staff.php">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">StaffRegister</span>
                </a></li>

                <li><a href="stafflogin.php">
                <i class="fa-solid fa-unlock-keyhole"></i>
                    <span class="link-name">StaffLogin</span>
                </a></li>

                <li><a href="AdminManual.pdf" target="_blank" class="manual">
                
                <i class="fa-solid fa-file-pdf"></i>
                    <span class="link-name">Download Staff Guide (PDF)</span>
                </a></li>
                

                    

                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            
            </ul>
        </div>
    </nav>
    <section class="dashboard">
    



            
            
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                    <i class="uil uil-estate"></i>
                        <span class="text">Total Adopt</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Review</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Like</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <form method="POST" id="searchForm" class="search-container">
    <div class="search-bar">
        <!-- Search Input Field -->
        <input type="text" id="searchDonation" name="searchDonation" placeholder="Search Donation Items 🔍">

        
        <button type="submit" class="sub">Search</button>
        <!-- Clear Button -->
        <button type="button" id="clearBtn" class="sub" onclick="clearSearch()">Clear</button>
    </div>
    </form>

    <div class="activity-datas" id="searchResults">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchDonation'])) {
            // Securely escape the user input
            $searchInput = mysqli_real_escape_string($connect, $_POST['searchDonation']);
            
            // SQL query to search by donation items
            $DOselect = "SELECT * FROM donationtb WHERE DonationItems LIKE '%$searchInput%'";
            $selectquery = mysqli_query($connect, $DOselect);

            // Check if any results found
            if (mysqli_num_rows($selectquery) > 0) {
                // Loop through the results
                while ($DOarray = mysqli_fetch_array($selectquery)) {
                    $DonationID = $DOarray['DonationID'];
                    $DonationFrequency = $DOarray['DonationFrequency'];
                    $DonationDate = $DOarray['DonationDate'];
                    $DonatorID = $DOarray['DonatorID'];
                    $DonationItems = $DOarray['DonationItems'];
                    $DescriptionOfPet = $DOarray['Descriptions'];
                    $DonationItemsPhoto = $DOarray['DonationItemsPhoto'];
                    $shortDescription = substr($DescriptionOfPet, 0, 0); // Get first 100 characters
                    $fullDescription = $DescriptionOfPet; // Full description
                    ?>
                    
                    <!-- Display Donation Data -->
                    <div class="data">
                        <span class="data-title">DonationID</span>
                        <span class="data-list"><?php echo $DonationID; ?></span>
                    </div>

                    <div class="data">
                        <span class="data-title">DonationFrequency</span>
                        <span class="data-list"><?php echo $DonationFrequency; ?></span>
                    </div>

                    <div class="data">
                        <span class="data-title">DonationDate</span>
                        <span class="data-list"><?php echo $DonationDate; ?></span>
                    </div>

                    <div class="data">
                        <span class="data-title">DonatorID</span>
                        <span class="data-list"><?php echo $DonatorID; ?></span>
                    </div>

                    <div class="data">
                        <span class="data-title">DonationItems</span>
                        <span class="data-list"><?php echo $DonationItems; ?></span>
                    </div>

                    <div class="data">
                        <span class="data-title">Description</span>
                        <div class="description">
                            <span class="short-desc"><?php echo $shortDescription; ?></span>
                            <span class="full-desc" style="display:none;"><?php echo $fullDescription; ?></span>
                            <button class="toggle-btn" onclick="toggleDescription(this)">See More</button>
                        </div>
                    </div>

                    <div class="data">
                        <span class="data-title">DonationItemsPhoto</span>
                        <span class="data-list">
                            <img src="<?php echo $DonationItemsPhoto; ?>" alt="Donation Image">
                        </span>
                    </div>

                    <?php
                }
            } else {
                // No results found
                echo "<p>No donations found matching your search.</p>";
            }
        }
        ?>
    </div>
            <form method="POST" id="adoptionSearchForm" class="search-container">
    <!-- Enter Pet Breed Input -->
    <div class="search-bars">
    
    <!-- Max Adoption Fee Input -->
    <input type="number" id="maxAdoptionFee" name="maxAdoptionFee" placeholder="Search Adoption Fees🔍" step="0.01">
    
    <!-- Search Button -->
    <button type="submit" class="sub">Search</button>
    
    <!-- Clear Button -->
    <button type="button" id="clearAdoptionBtn" class="sub" onclick="clearAdoptionSearch()">Clear</button>
    </div>
</form>

<!-- Display Search Results -->
<div class="activity-datass" id="adoptionSearchResults">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['maxAdoptionFee'])) {
        // Escape the user inputs
    
        $maxAdoptionFee = mysqli_real_escape_string($connect, $_POST['maxAdoptionFee']);

        // Query to filter adoption records by Pet Breed and Max Adoption Fee
        $ADselect = "SELECT * FROM adoptiontb WHERE  AdoptionFeesTotal <= $maxAdoptionFee";
        $selectquery = mysqli_query($connect, $ADselect);

        // Check if any results were found
        if (mysqli_num_rows($selectquery) > 0) {
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionID = $ADarray['AdoptionID'];
                $UserID = $ADarray['UserID'];
                $AdoptionLocation = $ADarray['AdoptionLocation'];
                $AdoptionPhoneNo = $ADarray['AdoptionPhoneNo'];
                $AdoptionQty = $ADarray['AdoptionQty'];
                $AdoptionFeesTotal = $ADarray['AdoptionFeesTotal'];
                $PaymentType = $ADarray['PaymentType'];
                $AdoptionStatus = $ADarray['AdoptionStatus'];
                $AdoptionDate = $ADarray['AdoptionDate'];
                ?>
                
                <!-- Display Adoption Data -->
                <div class="data">
                    <span class="data-title">AdoptionID</span>
                    <span class="data-list"><?php echo $AdoptionID; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">UserID</span>
                    <span class="data-list"><?php echo $UserID; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionLocation</span>
                    <span class="data-list"><?php echo $AdoptionLocation; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionPhoneNo</span>
                    <span class="data-list"><?php echo $AdoptionPhoneNo; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionQty</span>
                    <span class="data-list"><?php echo $AdoptionQty; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionFeesTotal</span>
                    <span class="data-list"><?php echo $AdoptionFeesTotal; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">PaymentType</span>
                    <span class="data-list"><?php echo $PaymentType; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionStatus</span>
                    <span class="data-list"><?php echo $AdoptionStatus; ?></span>
                </div>
                
                <div class="data">
                    <span class="data-title">AdoptionDate</span>
                    <span class="data-list"><?php echo $AdoptionDate; ?></span>
                </div>
                
                <?php
            }
        } else {
            // No results found
            echo "<p>No adoptions found matching your criteria.</p>";
        }
    }
    ?>
</div>
            <div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Recent Activity</span>
    </div>
    <div class="hh1">
        <br>
        <h1>User Info</h1>
    </div>
    

    
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title">UserID</span>
            <?php
            $Cselect = "SELECT * FROM usertb";
            $selectquery = mysqli_query($connect, $Cselect);
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $UserID = $Carray['UserID'];
                echo "<span class='data-list'>$UserID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserName</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $UserName = $Carray['UserName'];
                echo "<span class='data-list'>$UserName</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">Email</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Uemail = $Carray['UserEmail'];
                echo "<span class='data-list'>$Uemail</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">SureName</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Sname = $Carray['SurName'];
                echo "<span class='data-list'>$Sname</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserEmail</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Uemail = $Carray['UserEmail'];
                echo "<span class='data-list'>$Uemail</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserPassword</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Upass = $Carray['UserPassword'];
                echo "<span class='data-list'>$Upass</span>";
            }
            ?>
        </div>

    

        <div class="data">
    <span class="data-title"> UserAddress</span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    while ($Carray = mysqli_fetch_array($selectquery)) {
        $DescriptionOfPet = $Carray['UserAddress'];
        $shortDescription = substr($DescriptionOfPet, 0, 0); // Get the first 100 characters
        $fullDescription = $DescriptionOfPet; // Full description from the database
        echo "
            <div class='description'>
                <span class='short-desc'>$shortDescription</span>
                <span class='full-desc' style='display:none;'>$fullDescription</span>
                <button class='toggle-btn' onclick='toggleDescription(this)'>See More</button>
            </div>
        ";
    }
    ?>
</div>

        <div class="data">
            <span class="data-title">UserPhoneNo</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Uph = $Carray['UserPhoneNo'];
                echo "<span class='data-list'>$Uph</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">RegistrationMonth</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $Rm = $Carray['RegistrationMonth'];
                echo "<span class='data-list'>$Rm</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">Profile</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Carray = mysqli_fetch_array($selectquery)) {
                $pro = $Carray['Profile'];
                echo "<span class='data-lists'><img src='$pro' width='75%' height='60%' ></span>";
            }
            ?>
        </div>

        <div class="data">
        <span class="data-title">
            <!-- Use double quotes to embed PHP variables correctly -->
            <a href="CusEdit.php?CID=<?php echo $UserID; ?>">Edit</a>
        </span>
        
        <span class="data-title">
            <a href="CusDelete.php?CID=<?php echo $UserID; ?>">Delete</a>
        </span>
    </div>
    </div>

    <div class="hh1">
        <br>
        <h1>Staff Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title">StaffID</span>
            <?php
            $Cselect = "SELECT * FROM stafftb";
            $selectquery = mysqli_query($connect, $Cselect);
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $StaffID = $Sarray['StaffID'];
                echo "<span class='data-list'>$StaffID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">StaffName</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $StaffName = $Sarray['StaffName'];
                echo "<span class='data-list'>$StaffName</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">Position</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $Position = $Sarray['Position'];
                echo "<span class='data-list'>$Position</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">StaffEmail</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $StaffEmail = $Sarray['StaffEmail'];
                echo "<span class='data-list'>$StaffEmail</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">StaffPassword</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $StaffPassword = $Sarray['StaffPassword'];
                echo "<span class='data-list'>$StaffPassword</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> StaffPhNo </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Sarray = mysqli_fetch_array($selectquery)) {
                $StaffPhNo = $Sarray['StaffPhNo'];
                echo "<span class='data-list'>$StaffPhNo</span>";
            }
            ?>
        </div>

        <div class="data">
        <span class="data-title">
            <!-- Use double quotes to embed PHP variables correctly -->
            <a href="Staffedit.php?SID=<?php echo $StaffID; ?>">Edit</a>
        </span>
        
        <span class="data-title">
            <a href="StaffDelete.php?SID=<?php echo $StaffID; ?>">Delete</a>
        </span>
    </div>
        
        
        
    </div>

    <div class="hh1">
        <br>
        <h1>PetType Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title"> PetTypeID </span>
            <?php
            $Ptselect = "SELECT * FROM pettypetb";
            $selectquery = mysqli_query($connect, $Ptselect);
            while ($Ptarray = mysqli_fetch_array($selectquery)) {
                $Pid = $Ptarray['PetTypeID'];
                echo "<span class='data-list'>$Pid</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetType</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Ptarray = mysqli_fetch_array($selectquery)) {
                $PetType = $Ptarray['PetType'];
                echo "<span class='data-list'>$PetType</span>";
            }
            ?>
        </div>

        <div class="data">
        <span class="data-title">
            <!-- Use double quotes to embed PHP variables correctly -->
            <a href="PetTypeEdit.php?PTID=<?php echo $Pid; ?>">Edit</a>
        </span>
        
        <span class="data-title">
            <a href="PetTypeDelete.php?PTID=<?php echo $Pid; ?>">Delete</a>
        </span>
    </div>
        

        
        
    </div>

    <div class="hh1">
        <br>
        <h1>Pet Info</h1>
    </div>
    <br>
    <div class="activity-dataa">
        
        <div class="data">
            <span class="data-title">PetID</span>
            <?php
            $pselect = "SELECT * FROM pettb";
            $selectquery = mysqli_query($connect, $pselect);
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetID = $parray['PetID'];
                echo "<span class='data-list'>$PetID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetType</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $Pid = $parray['PetTypeID'];
                echo "<span class='data-list'>$Pid</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">Breed</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetBreed = $parray['PetBreed'];
                echo "<span class='data-lists'>$PetBreed</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">Quantity </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetQuantity  = $parray['PetQuantity'];
                echo "<span class='data-list'>$PetQuantity </span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">ArrivalDate</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $ArrivalDate = $parray['ArrivalDate'];
                echo "<span class='data-list'>$ArrivalDate</span>";
            }
            ?>
        </div>

        
        <div class="data">
    <span class="data-title"> PetLocation </span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    $index = 0; // Unique identifier for each pet
    while ($parray = mysqli_fetch_array($selectquery)) {
        $PetLocation = $parray['PetLocation'];
        echo "
        <div class='location-container'>
            <button class='see-more-btn' onclick='toggleMap($index)'>See More</button>
            <div id='map$index' class='map-container' style='display:none;'>
                <iframe src='$PetLocation' width='200' height='150' frameborder='0' style='border:0;' allowfullscreen></iframe>
            </div>
        </div>";
        $index++; // Increment index for unique IDs
    }
    ?>
</div>


        <div class="data">
            <span class="data-title"> AdoptionFees </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetAdoptionFees = $parray['PetAdoptionFees'];
                echo "<span class='data-list'>$PetAdoptionFees</span>";
            }
            ?>
        </div>

        <div class="data">
    <span class="data-title"> Description</span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    while ($parray = mysqli_fetch_array($selectquery)) {
        $DescriptionOfPet = $parray['DescriptionOfPet'];
        $shortDescription = substr($DescriptionOfPet, 0, 0); // Get the first 100 characters
        $fullDescription = $DescriptionOfPet; // Full description from the database
        echo "
            <div class='description'>
                <span class='short-desc'>$shortDescription</span>
                <span class='full-desc' style='display:none;'>$fullDescription</span>
                <button class='toggle-btn' onclick='toggleDescription(this)'>See More</button>
            </div>
        ";
    }
    ?>
</div>

        <div class="data">
            <span class="data-title"> Image1 </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetImage1 = $parray['PetImage1'];
                echo "<span class='data-lists'><img src='$PetImage1' width='40%' height='50%' ></span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> Image2 </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetImage2 = $parray['PetImage2'];
                echo "<span class='data-lists'><img src='$PetImage2' width='35%' height='50%' ></span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> Image3 </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($parray = mysqli_fetch_array($selectquery)) {
                $PetImage3 = $parray['PetImage3'];
                echo "<span class='data-lists'><img src='$PetImage3' width='40%' height='50%' ></span>";
            }
            ?>
        </div>

        <div class="data">
        <span class="data-title">
            <!-- Use double quotes to embed PHP variables correctly -->
            <a href="PetEdit.php?PID=<?php echo $PetID; ?>">Edit</a>
        </span>
        
        <span class="data-title">
            <a href="PetDelete.php?PID=<?php echo $PetID; ?>">Delete</a>
        </span>
    </div>

        
        
    </div>

    <div class="hh1">
        <br>
        <h1>Donator Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title">DonatorID</span>
            <?php
            $Dselect = "SELECT * FROM donatortb";
            $selectquery = mysqli_query($connect, $Dselect);
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $DonatorID = $Darray['DonatorID'];
                echo "<span class='data-list'>$DonatorID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">DonatorName</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $DonatorName = $Darray['DonatorName'];
                echo "<span class='data-list'>$DonatorName</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">DonatorEmail</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $DonatorEmail = $Darray['DonatorEmail'];
                echo "<span class='data-list'>$DonatorEmail</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> DonatorPhNo</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $DonatorPhNo = $Darray['DonatorPhNo'];
                echo "<span class='data-list'>$DonatorPhNo</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">DonatorAddress</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $DonatorAddress = $Darray['DonatorAddress'];
                echo "<span class='data-list'>$DonatorAddress</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> RegistrationDate </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($Darray = mysqli_fetch_array($selectquery)) {
                $RegistrationDate = $Darray['RegistrationDate'];
                echo "<span class='data-list'>$RegistrationDate</span>";
            }
            ?>
        </div>


        

</div>


<div class="hh1">
        <br>
        <h1>Donation Info</h1>
    </div>
    <br>
    <div class="activity-datas">
        
        <div class="data">
            <span class="data-title">DonationID</span>
            <?php
            $DOselect = "SELECT * FROM donationtb";
            $selectquery = mysqli_query($connect, $DOselect);
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonationID = $DOarray['DonationID'];
                echo "<span class='data-list'>$DonationID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">DonationFrequency</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonationFrequency = $DOarray['DonationFrequency'];
                echo "<span class='data-list'>$DonationFrequency</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> DonationDate 	</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonationDate = $DOarray['DonationDate'];
                echo "<span class='data-list'>$DonationDate</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> DonatorID</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonatorID = $DOarray['DonatorID'];
                echo "<span class='data-list'>$DonatorID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">DonationItems</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonationItems = $DOarray['DonationItems'];
                echo "<span class='data-list'>$DonationItems</span>";
            }
            ?>
        </div>

        <div class="data">
    <span class="data-title"> Description</span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    while ($DOarray = mysqli_fetch_array($selectquery)) {
        $DescriptionOfPet = $DOarray['Descriptions'];
        $shortDescription = substr($DescriptionOfPet, 0, 0); // Get the first 100 characters
        $fullDescription = $DescriptionOfPet; // Full description from the database
        echo "
            <div class='description'>
                <span class='short-desc'>$shortDescription</span>
                <span class='full-desc' style='display:none;'>$fullDescription</span>
                <button class='toggle-btn' onclick='toggleDescription(this)'>See</button>
            </div>
        ";
    }
    ?>
</div>

        

        <div class="data">
            <span class="data-title"> DonationItemsPhoto </span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DOarray = mysqli_fetch_array($selectquery)) {
                $DonationItemsPhoto = $DOarray['DonationItemsPhoto'];
                echo "<span class='data-lists'><img src='$DonationItemsPhoto' width='30%' height='50%' ></span>";
            }
            ?>
        </div>

</div>

<div class="hh1">
        <br>
        <h1>DonationDetails Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title"> DonationID </span>
            <?php
            $DDselect = "SELECT * FROM donationdetailstb  ";
            $selectquery = mysqli_query($connect, $DDselect);
            while ($DDarray = mysqli_fetch_array($selectquery)) {
                $DonationID = $DDarray['DonationID'];
                echo "<span class='data-list'>$DonationID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetID</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DDarray = mysqli_fetch_array($selectquery)) {
                $PetID = $DDarray['PetID'];
                echo "<span class='data-list'>$PetID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetQuantity</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($DDarray = mysqli_fetch_array($selectquery)) {
                $PetQuantity = $DDarray['PetQuantity'];
                echo "<span class='data-list'>$PetQuantity</span>";
            }
            ?>
        </div>
    
    </div>



    <div class="hh1">
        <br>
        <h1>Adoption Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title"> AdoptionID </span>
            <?php
            $ADselect = "SELECT * FROM adoptiontb    ";
            $selectquery = mysqli_query($connect, $ADselect);
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionID = $ADarray['AdoptionID'];
                echo "<span class='data-list'>$AdoptionID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserID</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $UserID = $ADarray['UserID'];
                echo "<span class='data-lists'>$UserID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionLocation</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionLocation = $ADarray['AdoptionLocation'];
                echo "<span class='data-list'>$AdoptionLocation</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionPhoneNo</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionPhoneNo = $ADarray['AdoptionPhoneNo'];
                echo "<span class='data-list'>$AdoptionPhoneNo</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionQty</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionQty = $ADarray['AdoptionQty'];
                echo "<span class='data-list'>$AdoptionQty</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionFeesTotal</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionFeesTotal = $ADarray['AdoptionFeesTotal'];
                echo "<span class='data-list'>$AdoptionFeesTotal</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PaymentType</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $PaymentType = $ADarray['PaymentType'];
                echo "<span class='data-list'>$PaymentType</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionStatus</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionStatus = $ADarray['AdoptionStatus'];
                echo "<span class='data-list'>$AdoptionStatus</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptionDate</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADarray = mysqli_fetch_array($selectquery)) {
                $AdoptionDate = $ADarray['AdoptionDate'];
                echo "<span class='data-list'>$AdoptionDate</span>";
            }
            ?>
        </div>
        

        
        
    </div>

    <div class="hh1">
        <br>
        <h1>AdoptionDetails Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title"> AdoptionID </span>
            <?php
            $ADDselect = "SELECT * FROM  adoptiondetailstb  ";
            $selectquery = mysqli_query($connect, $ADDselect);
            while ($ADDarray = mysqli_fetch_array($selectquery)) {
                $AdoptionID = $ADDarray['AdoptionID'];
                echo "<span class='data-list'>$AdoptionID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetID</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADDarray = mysqli_fetch_array($selectquery)) {
                $PetID = $ADDarray['PetID'];
                echo "<span class='data-list'>$PetID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">AdoptQuantity</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADDarray = mysqli_fetch_array($selectquery)) {
                $AdoptQuantity = $ADDarray['AdoptQuantity'];
                echo "<span class='data-list'>$AdoptQuantity</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">PetAdoptionFees</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($ADDarray = mysqli_fetch_array($selectquery)) {
                $PetAdoptionFees = $ADDarray['PetAdoptionFees'];
                echo "<span class='data-list'>$PetAdoptionFees</span>";
            }
            ?>
        </div>
    
    </div>

    <div class="hh1">
        <br>
        <h1>Review Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title">UserReviewID</span>
            <?php
            $revselect = "SELECT * FROM  reviewtb ";
            $selectquery = mysqli_query($connect, $revselect);
            while ($rearray = mysqli_fetch_array($selectquery)) {
                $UserReviewID = $rearray['UserReviewID'];
                echo "<span class='data-list'>$UserReviewID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserID</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($rearray = mysqli_fetch_array($selectquery)) {
                $UserID = $rearray['UserID'];
                echo "<span class='data-list'>$UserID</span>";
            }
            ?>
        </div>

        

        <div class="data">
    <span class="data-title"> Description</span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    while ($rearray = mysqli_fetch_array($selectquery)) {
        $DescriptionOfPet = $rearray['Review'];
        $shortDescription = substr($DescriptionOfPet, 0, 0); // Get the first 100 characters
        $fullDescription = $DescriptionOfPet; // Full description from the database
        echo "
            <div class='description'>
                <span class='short-desc'>$shortDescription</span>
                <span class='full-desc' style='display:none;'>$fullDescription</span>
                <button class='toggle-btn' onclick='toggleDescription(this)'>See More</button>
            </div>
        ";
    }
    ?>
</div>


</div>

<div class="hh1">
        <br>
        <h1> usercontact  Info</h1>
    </div>
    <br>
    <div class="activity-data">
        
        <div class="data">
            <span class="data-title">UserContactID</span>
            <?php
            $Uselect = "SELECT * FROM   usercontact  ";
            $selectquery = mysqli_query($connect, $Uselect);
            while ($uarray = mysqli_fetch_array($selectquery)) {
                $UserContactID = $uarray['UserContactID'];
                echo "<span class='data-list'>$UserContactID</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title">UserName</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($uarray = mysqli_fetch_array($selectquery)) {
                $UserName = $uarray['UserName'];
                echo "<span class='data-list'>$UserName</span>";
            }
            ?>
        </div>

        <div class="data">
            <span class="data-title"> 	UserEmail</span>
            <?php
            mysqli_data_seek($selectquery, 0); // Reset the query pointer
            while ($uarray = mysqli_fetch_array($selectquery)) {
                $UserEmail = $uarray['UserEmail'];
                echo "<span class='data-list'>$UserEmail</span>";
            }
            ?>
        </div>

        

        <div class="data">
    <span class="data-title"> Description</span>
    <?php
    mysqli_data_seek($selectquery, 0); // Reset the query pointer
    while ($uarray = mysqli_fetch_array($selectquery)) {
        $DescriptionOfPet = $uarray['UserMessage'];
        $shortDescription = substr($DescriptionOfPet, 0, 0); // Get the first 100 characters
        $fullDescription = $DescriptionOfPet; // Full description from the database
        echo "
            <div class='description'>
                <span class='short-desc'>$shortDescription</span>
                <span class='full-desc' style='display:none;'>$fullDescription</span>
                <button class='toggle-btn' onclick='toggleDescription(this)'>See More</button>
            </div>
        ";
    }
    ?>
</div>


</div>


    </section>
        <script src="script.js"></script>
    </body>
</html>
<script>
function toggleDescription(button) {
    var shortDesc = button.previousElementSibling.previousElementSibling; // Short description
    var fullDesc = button.previousElementSibling; // Full description
    
    if (fullDesc.style.display === "none") {
        // Show the full description
        fullDesc.style.display = "inline";
        shortDesc.style.display = "none";
        button.innerHTML = "See Less";
    } else {
        // Show the short description
        fullDesc.style.display = "none";
        shortDesc.style.display = "inline";
        button.innerHTML = "See More";
    }
}
</script>

<script>
function toggleMap(index) {
    var mapDiv = document.getElementById('map' + index);
    if (mapDiv.style.display === "none") {
        mapDiv.style.display = "block"; // Show the map
    } else {
        mapDiv.style.display = "none"; // Hide the map
    }
}
</script>
<script>
function clearSearch() {
    // Clear the search input field
    document.getElementById('searchDonation').value = '';
    
    // Clear the search results by hiding or removing the content
    document.getElementById('searchResults').innerHTML = '';
    
    // Optionally reset the form (in case any other inputs are added in the future)
    document.getElementById('searchForm').reset();
}
</script>

<script>
    function clearAdoptionSearch() {
    // Clear the search input fields
    
    document.getElementById('maxAdoptionFee').value = '';
    
    // Clear the search results by hiding or removing the content
    document.getElementById('adoptionSearchResults').innerHTML = '';
    
    // Optionally reset the form
    document.getElementById('adoptionSearchForm').reset();
}

</script>
<div class="sidebar">
    <div class="logo-details">

     
      <!-- <span class="logo_name">SMC</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="DonationDetails.php" class="active">
           
            <span class="color">Add Donation</span>
          </a>
        </li> -->
        