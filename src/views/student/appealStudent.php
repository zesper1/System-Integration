<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
    $vioID = '';
    $vioName = '';
    $vioSeverity = '';
    $vioDate = '';
    if(isset($_GET['violationID'])){
       $vioID = $_GET['violationID'];
    }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>writeAppealStudent</title>
</head>

<style>
    @font-face{
    font-family: 'pop';
    src: url(../../../public/assets/Fonts/Poppins-Bold.ttf);
    }

    /* containers */
    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100%;
        background-color: #E9EAF6;
        font-family: 'pop';
        height: 100vh;
    }

    .container{
        width: 100%;
        display: flex;
        height: 100%;
        flex-direction: column;
    }

    .con2{
        display: flex;
    }

    /* containers */

     /* topbar */

     .student{
        background-color: #34408D;
        width: 100%;
        height: 8%;
        display: flex;
        align-items: center;
        justify-content: left;
        border-bottom: 5px solid #E6C213;
    }

    .inf1{
        display: flex;
        width: 100%;
        align-items: center;
    }

    .logo{
        display: flex;
        justify-content: end;
    width: 95%;
    display: flex;
    color: white;
    }

.pic{
width: 40px;
height: 45px;
margin-right: 5px;
}

.NU{
    line-height: 1;
    display: flex;
    align-items: center;
}



    .toplogo{
        width: 30px;
        height: 30px;
        margin: 10px;
        cursor: pointer;
    }

    /* topbar */

    /* sidebar */

    .sidebar {
    background-color: white;
    width: 250px; /* Set the width of the sidebar */
    height: 100vh;
    position: fixed;
    left: -250px; /* Hide it initially */
    top: 0;
    transition: left 0.3s ease; /* Smooth sliding effect */
    z-index: 1000;
}

.sidebar.open {
    left: 0; /* Slide the sidebar into view */
}

.toggle-btn {
    position: fixed;
    left: 10px;
    top: 10px;
    background-color: #34408D;
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
    z-index: 1100;
    font-family: 'pop';
}

.toggle-btn.hidden {
    display: none;
}


.side {
    margin-left: 0; /* Adjust main content position */
    transition: margin-left 0.3s ease;
}

.side.shifted {
    margin-left: 250px; /* Shift main content to the right when sidebar is open */
}

.overview{
    width: 55%;
    height: 10%;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #AFB1C2;
}


.dashboard{
    width: 100%;
    height: 60%;  
    display: flex;
    flex-direction: column;
    align-content: center;
}

.dashboard .dashB{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
}

.dashboard .dashPIC{
    width: 25px;
    height: 25px;
    margin-left: 40px;
    cursor: pointer;
}

.dashboard .txtR{
    font-size: 17px;
    color: #595959;
    margin-left: 30px;
    cursor: pointer;
}

.session-name{
    color: #E6C213;
}

.dashboard .txtA{
    font-size: 20px;
    color: gold;
    margin-left: 30px;
}

.dashboard .users{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    color: gold;
}

 /* Dropdown styling */
 .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-top: 5px;
    margin-left: 70px;
    padding: 5px 0;
    border-radius: 5px;
}

.dropdown-content a {
    color: #595959;
    padding: 10px;
    text-decoration: none;
    display: block;
    font-size: 18px;
    margin: 5px 0;
}

.dropdown-content a:hover {
    background-color: #E9EAF6;
    color: #35408E;
}

/* sidebar */

/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .content1{
        display: flex;
        width: 100%;
        height: 15%;
    }


    .col{
        width: 50%;
        margin-left: 2%;
        display: flex;
        justify-content: center;
        color: #35408E;
        font-family: 'pop';
    }

    
    .text{
    color: white;
    display: flex;
    align-items: center;
    justify-content: start;
    height: 100%;
    width: 100%;
    font-size: 20px;
    margin-left: 60px;
    margin-top: 10px;
    }

    .content{
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .col{
            width: 100%;
            display: flex;
            justify-content: start;
            color: #35408E;
            font-family: 'pop';
        }

    
        .text{
    color: white;
    display: flex;
    align-items: center;
    justify-content: start;
    height: 100%;
    width: 100%;
    font-size: 20px;
    margin-left: 60px;
    margin-top: 10px;
    }

        /* Form Styling */

        .label{
    font-size: 20px;
    width: 15%;
    font-family: 'pop';
    color: #35408E;
    height: 25px;
    display: flex;
    align-items: end;
    align-content: end;
    justify-content: end;
}
        /* Form Styling */
        .report-form {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /*Report Form to yung Text Area for report details */
        .report-form textarea#reportName, .report-form textarea#statusDetails, .report-form textarea#statusDate {
            height: 40px;
            overflow: hidden;
        }

        .report-form label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            color: #34408D;
        }

        .report-form input, .report-form select, .report-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .report-form textarea {
            height: 100px;
        }

        .report-form button {
            padding: 10px 20px;
            background-color: #34408D;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .report-form button:hover {
            background-color: #2b357a;
        }


        a.dashB {
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px;
}

a.dashB img.dashPIC {
    margin-right: 10px;
}
   
</style>
<?php
// include "../../connection/db_conn.php";
// session_start();

$user_id = $_SESSION['id'];
$violations = [];
$reportDetails = null;

// Check if the success parameter is set
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script>alert("Successfully submitted your appeal. We will reach out to you via email. Thank you!");</script>';
}

// Check if a violationID is provided in the URL
if (isset($_GET['violationID'])) {
    $selectedViolationID = $_GET['violationID'];
} else {
    $selectedViolationID = null; // Default to null if not set
}

// Function to fetch violations of the user
function fetchViolations($conn, $user_id) {
    $query = "SELECT v.violation_ID, vt.violationTypeName 
              FROM violation v 
              JOIN violationtype vt ON v.violationType_ID = vt.violationType_ID 
              WHERE v.violator_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $violations = [];
    while ($row = $result->fetch_assoc()) {
        $violations[] = $row;
    }
    
    return $violations;
}

// Function to fetch report details if a violation is selected
function fetchReportDetailsAssocatedToUserViolation($conn, $selectedViolationID) {
    $reportQuery = "SELECT r.reportName, rs.status_DETAILS, rs.status_DATE 
                    FROM violation v 
                    JOIN Report r ON r.report_ID = v.violationDetail_ID 
                    JOIN ReportStatus rs ON r.report_ID = rs.reportID
                    WHERE v.violation_ID = ?";
    
    $reportStmt = $conn->prepare($reportQuery);
    $reportStmt->bind_param("i", $selectedViolationID);
    
    $reportDetails = null;
    if ($reportStmt->execute()) {
        $reportResult = $reportStmt->get_result();
        if ($reportResult->num_rows > 0) {
            $reportDetails = $reportResult->fetch_assoc();
        } else {
            echo "No report found for this violation.";
        }
    } else {
        echo "Error executing query: " . $reportStmt->error;
    }
    
    return $reportDetails;
}

// Fetch violations
$violations = fetchViolations($conn, $user_id);
$hasViolations = count($violations) > 0;

// Fetch report details if a violation is selected
if ($hasViolations && isset($_POST['title'])) {
    $selectedViolationID = $_POST['title'];
    $reportDetails = fetchReportDetailsAssocatedToUserViolation($conn, $selectedViolationID);
}elseif (isset($selectedViolationID)) {
    $reportDetails = fetchReportDetailsAssocatedToUserViolation($conn, $selectedViolationID);
}
?>
<body>
    <div class="container">

        <!-- --------------<p>topbar</p>-------------------- -->
        <div class="student">
<div class="col">
        <div class="text">
        <label class="hello"> HELLO, 
        <span class="session-name">
        <?php 
// Display the session variable 'name'
        echo $_SESSION["name"]; 
        ?>
        </span>
        </label>
        </div>
    </div>

    <div class="inf1">
    <div class="logo">
        <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">
    <label class="NU">NATIONAL UNIVERSITY</label> 
    </div> 
</div>
</div>
        <!-- --------------<p>topbar</p>-------------------- -->

        <div class="con2">

        <!-- --------------<p>sidebar</p>-------------------- -->
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>
        <div class="side">
        <div class="sidebar">
            <div class="overview">OVERVIEW</div>  

            <div class="dashboard">

            <line onclick="navigateTo('dashboardstudent.php')" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> DASHBOARD</label>
        </line>
        
        <line onclick="navigateTo('reportStudent.php')" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> REPORTS</label>
        </line>
        
        <line onclick="navigateTo('appealStudent.php')" class="dashB">
            <a href="appealStudent.php"><img src="../../../public/assets/images/paper.png" class="dashPIC"></a>
            <label class="txtR"> APPEAL</label>
        </line>

        <line class="dashB">
        <a id="logout-link" >
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR"> LOGOUT</label>
        </line>
    </div>

        </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->
         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">

        <div class="label">APPEAL</div>

            <!-- Report Form -->
<form class="report-form" action="appealInsertion.php" method="POST">
    <label for="title">Select Violation:</label>
        <select id="title" name="title" required onchange="fetchReportDetails()">
        <option value="" disabled selected>--Please select a violation.--</option>
        <?php if ($hasViolations): ?>
            <?php foreach ($violations as $violation): ?>
                <option value="<?php echo $violation['violation_ID']; ?>" 
                    <?php 
                        echo (isset($selectedViolationID) && $selectedViolationID == $violation['violation_ID']) ? 'selected' : ''; 
                    ?>
                >
                    <?php echo "Violation ID: ", htmlspecialchars($violation['violation_ID']); ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option disabled>No violations to be appealed</option>
        <?php endif; ?>
    </select>

    <div id="report-info" style="display: none;">
        <label>Report Details:</label>
        <label id="reportName"></label>
        <label id="statusDetails"></label>
        <label id="statusDate"></label>
    </div>


    <label for="description">Enter your appeal:</label>
    <textarea id="description" name="description" required></textarea>

    <!-- Add a hidden input to send the selected violation ID -->
    <input type="hidden" name="violation_id" value="<?php echo isset($selectedViolationID) ? htmlspecialchars($selectedViolationID) : ''; ?>">

    <button type="submit">SUBMIT</button>
</form>

        </div>
    </div>
</body>
<script>
function fetchReportDetails() {
    const selectedViolationID = document.getElementById('title').value;

    if (selectedViolationID) {
        fetch(`fetchReportDetails.php?violation_id=${selectedViolationID}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("reportName").textContent = data.reportName;
                    document.getElementById("statusDetails").textContent = data.statusDetails;
                    document.getElementById("statusDate").textContent = data.statusDate;
                    document.getElementById("report-info").style.display = 'block';
                } else {
                    document.getElementById("report-info").style.display = 'none';
                }
            })
            .catch(error => console.error('Error fetching report details:', error));
    } else {
        document.getElementById("report-info").style.display = 'none';
    }
}


function submitReportSelection() {
    document.querySelector('.report-form').submit();
}
</script>

<script>
// Function to display report details
function displayReportDetails() {
    const reportName = "<?php echo $reportDetails ? addslashes($reportDetails['reportName']) : ''; ?>";
    const statusDetails = "<?php echo $reportDetails ? addslashes($reportDetails['status_DETAILS']) : ''; ?>";
    const statusDate = "<?php echo $reportDetails ? addslashes($reportDetails['status_DATE']) : ''; ?>";

    document.getElementById("reportName").textContent = reportName;
    document.getElementById("statusDetails").textContent = statusDetails;
    document.getElementById("statusDate").textContent = statusDate;

    document.getElementById("report-info").style.display = reportName ? 'block' : 'none';
}

// Call the function to display report details on page load
window.onload = displayReportDetails;
</script>
<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>

<script>
   // Function to navigate between pages
   function navigateTo(pagename) {
        window.location.href = pagename;
    }
    document.getElementById('logout-link').addEventListener('click', function(event) {                  
    event.preventDefault(); // Prevent immediate navigation
    var confirmation = confirm('Are you sure you want to log out?'); // Show confirmation dialog                     
    if (confirmation) {
        window.location.href = "../../config/logout.php"; // Redirect if confirmed
    }
});

    const violationID = "v" + <?php echo $vioID ?>;
    console.log(violationID);
    const violationTitle = document.getElementById('title');

    // Loop through the options to find the matching value
    for (var i = 0; i < violationTitle.options.length; i++) {
        if (violationTitle.options[i].value === violationID) {
            violationTitle.value = violationID; // Set the value to the matching violationID
            break; // Exit the loop once the value is set
        }
    }
    document.getElementById('logout-link').addEventListener('click', function(event) {                  
        event.preventDefault();                           
        var confirmation = confirm('Are you sure you want to log out?');                         
        if (confirmation) {
            window.location.href = "../../config/logout.php";
        }
    });
</script>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const container = document.querySelector('.container');
    const toggleButton = document.querySelector('.toggle-btn');

    sidebar.classList.toggle('open');
    container.classList.toggle('shifted');
    toggleButton.classList.toggle('hidden'); // Toggle the hidden class
}

</script>
</html>