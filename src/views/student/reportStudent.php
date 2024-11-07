<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reportStudent</title>
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
        justify-content: center;
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
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
}

/* Table Section Container */

.label{
    font-size: 20px;
    width: 80%;
    font-family: 'pop';
    color: #35408E;
    height: 25px;
    display: flex;
    align-items: end;
    align-content: end;
    justify-content: start;
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


/* Modal Overlay */
.modal {
    display: none; /* Initially hidden */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5); /* Semi-transparent black */
    transition: opacity 0.3s ease;
}

.modal.show {
    display: block; /* Display modal */
    opacity: 1; /* Fade in */
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #888;
    border-top: 30px solid #2b3377;
    width: 60%;
    max-width: 600px; /* Max width for larger screens */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    text-align: center;
}

.modal-content input {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.modal-content #closeBtn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    background: none;
    border: none;
    color: #888;
    cursor: pointer;
    transition: color 0.3s ease;
}

.modal-content #closeBtn:hover {
    color: #333; /* Darker color on hover */
}

.session-name{
    color: #E6C213;
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

 /* Form Styling */
 .report-form {
            width: 80%;
            height: 120%;
            max-height: 500px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: auto;
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
            resize: none;
        }

        .button {
            width: 15%;
            height: 40px;
            padding: 10px 20px;
            background-color: #34408D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 85%;
        }

        button:hover {
            background-color: #2b357a;
        }
    .select, .violator{
        display: none;
    }
    .active{
        display: block;
    }
    .result-box{
        background-color: lightslategray;
    }
    .result-box ul {
        border-top:1px solid #999;
        padding: 15px 10px;
    }
    .result-box ul li{
        list-style: none;
        border-radius: 3px;
        padding: 15px 10px;
        cursor: pointer;
    }
    .result-box ul li:hover{
        background-color: #E6C213;
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
    //include "../../connection/db_conn.php";
    //session_start();
    $userID = $_SESSION["id"]; 


    $violationQuery = "
    SELECT
        v.violation_ID, 
        vt.violationTypeName, 
        s.severity_LEVEL, 
        v.violation_Date,
        CONCAT(userdetails.first_name,' ', userdetails.last_name) AS name
    FROM 
        violation v 
    JOIN 
        violationtype vt ON v.violationType_ID = vt.violationType_ID 
    JOIN 
        severity s ON v.severity_ID = s.severity_ID 
    JOIN
        userdetails ON v.violator_ID = userdetails.userID
    WHERE 
        v.violator_ID = ?";
    $stmt = $conn->prepare($violationQuery);
    $stmt->bind_param("i", $userID); 
    $stmt->execute();
    $violationsResult = $stmt->get_result();
    $violations = $violationsResult->fetch_all(MYSQLI_ASSOC);


    $reportQuery = "SELECT r.report_ID, CONCAT(ud.first_name, ' ', ud.last_name) AS student_name, r.reportName, rs.status 
                    FROM report r 
                    JOIN userdetails ud ON r.reportOwnerID = ud.userID 
                    JOIN reportstatus rs ON r.report_ID = rs.reportID 
                    WHERE r.reportOwnerID = ?";
    $stmt = $conn->prepare($reportQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $reportsResult = $stmt->get_result();
    $reports = $reportsResult->fetch_all(MYSQLI_ASSOC);

    function fetchViolationtypes($conn){
        $fetch_vTypes = $conn->prepare("SELECT * FROM violationtype");
        $fetch_vTypes->execute();
        $fetch_vRes = $fetch_vTypes->get_result();
        if($fetch_vRes){
            if($fetch_vRes-> num_rows > 0){
                while($row = $fetch_vRes->fetch_assoc()){
                    echo "
                    <option value = $row[violationType_ID]>$row[violationTypeName]</option>
                    ";
                }
            }
        }
    }

    function fetchComplaintTypes($conn){
        $fetch_vTypes = $conn->prepare("SELECT * FROM complains_category");
        $fetch_vTypes->execute();
        $fetch_vRes = $fetch_vTypes->get_result();
        if($fetch_vRes){
            if($fetch_vRes-> num_rows > 0){
                while($row = $fetch_vRes->fetch_assoc()){
                    echo "
                    <option value = $row[ccID]>$row[ccName]</option>
                    ";
                }
            }
        }
    }

    function fetchSchoolTypes($conn){
        $fetch_vTypes = $conn->prepare("SELECT * FROM school");
        $fetch_vTypes->execute();
        $fetch_vRes = $fetch_vTypes->get_result();
        if($fetch_vRes){
            if($fetch_vRes-> num_rows > 0){
                while($row = $fetch_vRes->fetch_assoc()){
                    echo "
                    <option value = $row[id]>$row[SchoolName]</option>
                    ";
                }
            }
        }
    }
?>
<body>
    <div class="container">
    <div class="modal hidden" id="view-modal">
            <div class="modal-content">
                <div class="mc-header">
                    You have been found guilty for doing: <input id="violationName" type="text" readonly>
                </div>
                <div class="mc-date">
                    Submitted on: <input id="violationDate" type="text" readonly>
                </div>
                <div class="mcr-details" id="mc-repdet">
                    Report Description: <span id="mcrepdet"></span>
                </div>
                <div class="mcr-attachment">
                    Attachment to support the claim: <img src="" alt="" id="mc-attch" width="100px" height="100px">
                </div>
                <button id="closeBtn" onclick="closeModal()">&times;</button>
            </div>
        </div>
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
            <label class="txtR">  APPEAL</label>
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
    
<!-- Received Violations Table -->

<div class="label">WRITE A REPORT</div>

 <!-- Report Form -->
 <form class="report-form" id="reportForm" action="../../config/add.php" method="POST" enctype= "multipart/form-data">
                <label for="title">Report Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter the report title" required>

                <label for="type">Report Type:</label>
                <select id="reportType" name="type" required>
                    <option value="Default" default>Choose a report type.</option>
                    <option value="Violation">Violation</option>
                    <option value="Complaint">Complaint</option>
                </select>
                
                <label for="cType" id="cTypeLabel" style="display: none;">Complaint Type:</label>
                    <select id="cType" name="cType" class="select">
                        <option value="Default" default>Choose a complaint type.</option>
                        <?php fetchComplaintTypes($conn); ?>
                </select>
                <div id="nameCourseFields" class="select">
                    <label for="vType">Violation:</label>
                    <select id="vType" name="vType" class="select">
                        <option value="Default" default>Choose a violation type.</option>
                        <?php fetchViolationtypes($conn); ?>
                    </select>
                    <label for="courseSelect">School:</label>
                    <select type="text" id="inputcourse" class="violator" name="courseSelect" placeholder="Enter course">
                        <option value="Default" default>School</option>
                        <?php fetchSchoolTypes($conn); ?>
                    </select>    
                    <label for="vName">Name:</label>
                    <input type="text" id="inputname" class="violator" name="violator" placeholder="Enter student name" autocomplete = "off">
                    <div class="result-box">
                        <?php
                        $studentArray = []; 
                        $stmt = $conn->prepare("SELECT * FROM user WHERE role_id = 3");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result){
                            if($result->num_rows >0){
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
                                    $studentArray[] = ["id" => $row["user_ID"], "name" => $studentName];
                                }
                            }
                        }
                        $jsonData = json_encode($studentArray);
                        ?>
                    </div>
                </div>
                
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Describe the issue..." required></textarea>
                
                <label for="image">Attach Image (optional):</label>
                <input type="file" id="image" name="my_image">

                <button type="submit" name="submitReport" value="Submit Report" class="button"> SUBMIT</button>
            </form>
    </div>
    </div>

     <!-- --------------<p>mainbar</p>-------------------- -->
           
        </div>   
    </div>
    </div>
</body>

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
    // Get the select element
    const selectElement = document.getElementById("reportType");
    const inputName = document.getElementById("inputname");
    const inputCourse = document.getElementById("inputcourse");
    const reportForm = document.getElementById("reportForm");
    const violationSelect = document.getElementById("vType");

    const complaintSelect = document.getElementById("cType");
    const complaintLabel = document.getElementById("cTypeLabel");

    const nameCourseFields = document.getElementById("nameCourseFields");
    // Add event listener for 'change' event
    selectElement.addEventListener("change", function() {
    // Get the selected option value
    const selectedValue = selectElement.value;
    if(selectedValue == "Violation"){
        inputName.classList.add('active');
        inputCourse.classList.add('active');
        violationSelect.classList.add('active');
        nameCourseFields.classList.add("active");
        complaintLabel.classList.remove("active");
        complaintSelect.style.display = "none";
        reportForm.style.overflowY = 'auto';
    } else if(selectedValue == "Complaint") {
        inputName.classList.remove('active');
        inputCourse.classList.remove('active');
        violationSelect.classList.remove('active');
        nameCourseFields.classList.remove("active");
        complaintLabel.classList.add("active");
        complaintSelect.style.display = "block";
        reportForm.style.overflowY = 'scroll';
    }
    // Perform action based on the selected value
    console.log("You selected:", selectedValue);
    });

</script>
<script>
    var searchData = <?php echo $jsonData; ?>;
    const resultsBox = document.querySelector(".result-box");
    const inputBox = document.getElementById("inputname");

    inputBox.onkeyup = function() {
        let keyword = inputBox.value;

        // Ensure that the keyword is a string and is not empty
        if (typeof keyword === "string" && keyword.trim() !== "") {
            keyword = keyword.toLowerCase();  // Convert the keyword to lowercase

            // Filter the students array based on the 'name' property
            const filteredStudents = searchData.filter(function(student) {
                return student.name.toLowerCase().includes(keyword);
            });

            // Display the filtered students
            console.log(filteredStudents);
            display(filteredStudents);
            resultsBox.style.display = "block";
        } else {
            resultsBox.innerHTML = "";
            resultsBox.style.display = "none";
        }
        
    };
    function display(result) {
    if (result.length > 0) {
        // If there are matching students, display them
        const content = result.map((student) => {
            return "<li onclick=selectInput(this)>" + "(ID: " +student.id + ") "+student.name  + "</li>";
        }).join(''); // Join without commas

        resultsBox.innerHTML = "<ul>" + content + "</ul>";
    } else {
        // If no students are found, display a "No students found" message
        resultsBox.innerHTML = "<p>No students found</p>";
    }
 }

    function selectInput(list){
        inputBox.value = list.innerHTML;
        resultsBox.innerHTML = '';
    }
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