<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admindb</title>
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
        height: 100vh;
        overflow: hidden;
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
        font-family: 'pop';
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



    .info2{
        width: 100%;
        display: flex ;
        justify-content: end;
        align-items: center;
        margin-right: 10px;
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
    font-family: 'pop';
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

/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
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

    .CHARGE-A-VIOLATION{
        color: #35408E ;
        font-family: 'pop';
        margin-left: 6%;
    }

    .charge{
        width: 100%;
    }

    /* Form Styling */
    form {
        width: 80%;
        margin: 20px auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        color: #34408D;
        font-style: bold;
        height: auto;
        overflow: auto;
    }

 

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: 'pop';
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #35408E;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
    }

    input[type="submit"]:hover {
        background-color: #2d3670;
    }

    .result-box {
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: none;
        margin-bottom: 20px;
    }

    .result-box ul {
        list-style-type: none;
        padding: 0;
    }

    .result-box ul li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #ddd;
    }

    .result-box ul li:hover {
        background-color: #E6C213;
    }

    #report-info {
        background-color: #f2f2f2;
        padding: 15px;
        border-radius: 5px;
        display: none;
        margin-bottom: 20px;
    }

    #report-info h3 {
        margin-bottom: 10px;
        font-size: 20px;
        color: #35408E;
    }

    #report-info p {
        margin: 5px 0;
        font-size: 16px;
    }

    #report-info a {
        color: #34408D;
        text-decoration: none;
        font-size: 16px;
    }

    #report-info a:hover {
        text-decoration: underline;
    }
</style>

<?php
    //include "../../connection/db_conn.php";
    //session_start();

function fetchStudent($conn, array $array){
        $id = 3;
        $stmt = $conn->prepare("SELECT * FROM user WHERE role_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $fetchName = $conn->prepare("SELECT * FROM userdetails WHERE userID=?");
                    $fetchName->bind_param("i", $row["user_ID"]);
                    $fetchName->execute();
                    $fnRes = $fetchName->get_result();
                    if($fnRes){
                        if($fnRes->num_rows > 0){
                           $row1 = $fnRes->fetch_assoc();
                            $studentName = $row1['last_name'] . ", " . $row1['first_name'];        
                        }
                    }
                    $array[] = ["id" => $row["user_ID"], "name" => $studentName];
                }
            }
        }
        return $array;
    }
    function fetchViolations($conn){
        $stmt = $conn->prepare("SELECT * FROM violationtype");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option id = '$row[violationType_ID]' value = '$row[violationType_ID]'>$row[violationTypeName]</option>";
                }
            }
        }
    }
    function fetchReport($conn, array $array) {
        $stmt = $conn->prepare("
            SELECT 
                report.report_ID AS report_id, 
                report.reportName, 
                report.reportType,
                reportstatus.status_DETAILS,
                userdetails.first_name AS reporter_first_name,
                userdetails.last_name AS reporter_last_name,
                attachment.fileName AS fileName
            FROM 
                report
            JOIN 
                reportstatus ON report.report_ID = reportstatus.reportID 
            JOIN
                attachment ON report.report_ID = attachment.reportID
            JOIN 
                user ON report.reportOwnerID = user.user_ID 
            JOIN 
    userdetails ON user.user_ID = userdetails.userID;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $array = []; // Initialize the array
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $array[] = [
                        "id" => $row["report_id"],
                        "name" => $row["reportName"],
                        "reportType" => $row["reportType"],
                        "description" => $row["status_DETAILS"],
                        "reporterName" => $row["reporter_last_name"] . ", " . $row["reporter_first_name"], // Updated
                        "filename" => $row["fileName"]
                    ];
                }
            }
        }
        return $array;
    }
    
    
    function fetchSeverity($conn){
        $stmt = $conn->prepare("SELECT * FROM severity");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option id = '$row[severity_ID]' value = '$row[severity_LEVEL]'>$row[severity_LEVEL]</option>";
                }
            }
        }
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addViolation'])) {
    $_SESSION["success"] = true;
}

if (isset($_SESSION["success"])) {
    echo "
    <script>
        window.onload = function() {
            if (" . ($_SESSION["success"] ? 'true' : 'false') . ") {
                alert('Violation added successfully!');
            } else {
                alert('Failed to add violation. Please try again.');
            }
            // Clear the session variable after showing the alert
            window.onload = null; // Remove this function to prevent repeated alerts
        };
    </script>
    ";
    unset($_SESSION["success"]);
}
    
?>
      
</style>

<body>
    <div class="container">


         <!-- --------------<p>navbar</p>-------------------- -->
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
         <!-- --------------<p>navbar</p>-------------------- -->

        <div class="con2">

        <!-- --------------<p>sidebar</p>-------------------- -->
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>
        <div class="side">
        <div class="sidebar">
            <div class="overview">OVERVIEW</div>  

            <div class="dashboard">

        <line onclick="navigateTo('dashboardAdmin.php')" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> DASHBOARD</label>
        </line>
        
        <line onclick="navigateTo('reportsAdmin.php')" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> REPORTS</label>
        </line>
        
        <line onclick="navigateTo('appealAdmin.php')" class="dashB">
            <a href="appealAdmin.php"><img src="../../../public/assets/images/paper.png" class="dashPIC"></a>
            <label class="txtR"> REPLY TO APPEAL</label>
        </line>

        <line onclick="navigateTo('adminViolation.php')" class="dashB">
            <a href="adminViolation.php"><img src="../../../public/assets/images/warning.png" class="dashPIC"></a>
            <label class="txtR"> VIOLATION</label>
        </line>
        
        <line onclick="navigateTo('viewUsersAdmin.php')" class="dashB">
            <a href="viewUsersAdmin.php"><img src="../../../public/assets/images/users.png" class="dashPIC"></a>
            <label class="txtR"> VIEW USER</label>
        </line>

        <line onclick="navigateTo('addFaculty.php')" class="dashB">
            <a href="addFaculty.php"><img src="../../../public/assets/images/add-user-3-xxl.png" class="dashPIC"></a>
            <label class="txtR"> ADD FACULTY</label>
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
            <div class="charge">
                <div class="text">
                <label class="CHARGE-A-VIOLATION"> CHARGE A VIOLATION
                </span>
                </label>
                </div>
            </div>

            <form method="post" action="../../config/add.php">
                
                <label for="StudentName">Violator Name:</label>
                    <?php
                        $temp = array(); 
                        $students = fetchStudent($conn, $temp);
                        $dump = array(); 
                        $reports = fetchReport($conn, $dump);

                        $searchQuery = [
                            "group1" => $students,
                            "group2" => $reports
                        ];

                        $jsonified = json_encode($searchQuery);
                    ?>
                <input type="text" name="StudentName" id="StudentName" placeholder="Search by student name" required>
                <br>
                <div class="result-box" id="resultsBox1"></div>
                <label for="ViolationType">Violation Type:</label>
                <select name="ViolationType" id="ViolationType" required>
                    <?php
                        fetchViolations($conn);
                    ?>
                </select>
                <br>
                <label for="ViolationSeverity">Violation Severity:</label>
                <select name="ViolationSeverity" id="ViolationSeverity" required>
                    <?php
                        fetchSeverity($conn);
                    ?>
                </select>
                <br>
                <label for="SupportingDetail">Supporting Evidence:</label>
                <input type="text" name="SupportingDetail" id="SupportingDetail" placeholder="Search by report name" required>
                <div class="result-box" id="resultsBox2"></div>
                <div id="report-info" style="display: none;">
                    <input type="hidden" name="repDetID" id="repDetID" readonly>
                    <h3>Report Details:</h3>
                    <p id="rdc-desc"></p> <!-- For description -->
                    <p id="rdc-name"></p> <!-- For report name -->
                    <p id="rdc-reporter"></p> <!-- For reporter name -->
                    <a id="rdc-link" target="_blank">View Attachment</a> <!-- For report attachment -->
                </div>
                <input type="submit" name="addViolation" value="Submit">
            </form>
            

            
        </div> 
        <!-- --------------<p>mainbar</p>-------------------- --> 

    </div>
    </div>
</body>
<script>

function displayReportDetails(report) {
    document.getElementById("repDetID").value = report.id;
    document.getElementById("rdc-desc").textContent = report.description;
    document.getElementById("rdc-name").textContent = report.name;
    document.getElementById("rdc-reporter").textContent = "Reported by: " + report.reporterName; // New line added
    document.getElementById("rdc-link").href = report.filename ? report.filename : "#"; // Update link if filename exists
    document.getElementById("report-info").style.display = "block";
}

</script>
<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>

<script>   
    document.getElementById('logout-link').addEventListener('click', function(event) {                  
        event.preventDefault();                           
        var confirmation = confirm('Are you sure you want to log out?');                         
        if (confirmation) {
            window.location.href = "../../config/logout.php";
        }
    });
</script>

<script>
    
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.txtR')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>

<script>
   var searchData = <?php echo $jsonified; ?>;  // Assuming both searchData use the same data
</script>

<script src="../../../public/assets/js/adminViolation.js" defer></script>

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