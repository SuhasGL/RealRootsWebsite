<?php
include('./includes/connect.php');
 // Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["userId"])) {
    // The user is logged in
    $userId = $_SESSION["userId"];
}
$query = "SELECT p.purchaseId, p.propertyId, p.price, p.bookingDate, a.agentName,p.status FROM purchases p INNER JOIN agents a ON p.agentId = a.agentId WHERE p.userId = '$userId'";
$result = mysqli_query($con, $query);

// Check if there are any records

echo'  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RealRoots</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <style>
                    /* Add CSS for centering the table and margin collapse */
                    body{
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin: 0;
                        padding: 0;
                        height: 100vh;
                        }
                    table {
                        
                        border-collapse: collapse;
                        width: 80%; /* Adjust the width as needed */
                        margin-top: 20px; /* Add margin space below the heading */
                    }
                    table, th, td {
                        
                        border: 1px solid black;
                        text-align: center;
                    }
                    th, td {
                        padding: 10px;
                    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
            <div class="container-fluid nav-bar bg-transparent">
                <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                        <a href="main_project.php" class="navbar-brand d-flex align-items-center text-center">
                            <div class="icon p-2 me-2">
                                <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                            </div>
                            <h1 class="m-0 text-primary">RealRoots</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav ms-auto">
                                <a href="main_project.php" class="nav-item nav-link active">Home</a>
                                <a href="about.html" class="nav-item nav-link">About</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="property-list.php" class="dropdown-item">Property List</a>
                                        <a href="property-type.php" class="dropdown-item">Property Type</a>
                                        <a href="property-agent.php" class="dropdown-item">Property Agent</a>
                                    </div>
                                </div>
                            
                                <a href="testimonial.html" class="nav-item nav-link">Reviews</a>
                                <a href="contact.html" class="nav-item nav-link">Contact</a>
                                <a href="mypurchases.php" class="nav-item nav-link">My Bookings</a>
                                <li class="nav-item">
                            <form action="javascript:void(0);" class="form" onsubmit="redirectToLoginPage()">
                                <button style="border:none " type="submit" class="nav-item nav-link" name="logout">Logout</button>
                            </form>
                        </li>
                            </div>
                        </div>
                </nav>
            </div>
        </div>        


        
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <br><br> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">My Purchases</li>
                        </ol>
                        </nav>
                </div>
            </div>
        </div>';
    if (mysqli_num_rows($result) > 0) {
    // Start HTML table
    echo '<table border="1">
            <tr>
                <th>Purchase Id</th>
                <th>PropertyId</th>
                <th>Price</th>
                <th>Booking Date</th>
                <th>Agent</th>
                <th>Status</th>
            </tr>';

    // Fetch and display agent records
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['purchaseId'] . '</td>
                <td>' . $row['propertyId'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['bookingDate'] . '</td>
                <td>' . $row['agentName'] . '</td>
                <td>' . $row['status'] . '</td>
              </tr>';
    }

    // Close the HTML table
    echo '</table></body>';
} else {
    echo 'No Bookings found.';
}

// Close the database connection
mysqli_close($con);
echo'
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/wow/wow.min.js"></script>
    <script src="./lib/easing/easing.min.js"></script>
    <script src="./lib/waypoints/waypoints.min.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Custom JavaScript -->
    <script src="./js/main.js"></script>
    <script>
        function redirectToLoginPage() {
            // Redirect to login.html';echo"
            window.location.href = 'login.html';
        }
    </script>
</body>
</html>";
?>
