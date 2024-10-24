<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();

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
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>writeReportStudent</title>
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
    }

    .inf1{
        display: flex;
        width: 50%;
        align-items: center;
    }

    .logo{
    width: 100%;
    display: flex;
    color: white;
    margin-left: 10px;
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

    .inf{
        display: flex;
        width: 50%;
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

.sidebar{
background-color: white;
width: 25%;
height: 92vh;
}

.overview{
    width: 100%;
    height: 10%;
    font-size: 15px;
    display: flex;
    align-items: start;
    justify-content:left;
    align-items: end;
    color: #AFB1C2;
    margin-left: 40px;
}

.dashboard{
    width: 100%;
    height: 80%;  
    display: flex;
    flex-direction: column;
    align-content: center;
}

.dashboard .dashB{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    margin-top: 10px;

}

.dashboard .dashPIC{
    width: 30px;
    height: 30px;
    margin-left: 40px;
    cursor: pointer;
}

.dashboard .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 10px;
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

.LO{
    display: flex;
    height: 10%;
    align-content: end;
    width: 100%;
}

.LO .dashPIC{
    width: 30px;
    height: 30px;
    margin-left: 40px;
    cursor: pointer;
}

.LO .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 30px;
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
        height: 10%;
    }

    .col{
        width:100%;
        height: 55px;
        display: flex;
        justify-content: start;
        color: #35408E;
        font-family: 'pop';
    }

    .text{
        color: #35408E;
        display: flex;
    align-items: center;
    justify-content: start;
    height: 100%;
    width: 50%;
    font-size: 30px;
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
            color: #35408E;
            display: flex;
            align-items: center;
            justify-content: start;
            height: 100%;
            width: 50%;
            font-size: 30px;
            margin-left: 60px;
            margin-top: 10px;
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

<body>
    <div class="container">

        <!-- --------------<p>topbar</p>-------------------- -->
        <div class="student">
            <div class="inf1">
            <div class="logo">
                <img src="../../../public/assets/images/NU_shield.svg.png" class="pic">
            <label class="NU">NATIONAL UNIVERSITY</label> 
            </div> 
        </div>
            <div class="inf">
          
            <div class="info2">
                <img src="../../../public/assets/images/bell.png" class="toplogo">
                <img src="../../../public/assets/images/settings.png" class="toplogo">
            </div>
        </div>
        </div>
        <!-- --------------<p>topbar</p>-------------------- -->

        <div class="con2">

        <!-- --------------<p>sidebar</p>-------------------- -->
        <div class="sidebar">

            <div class="overview">OVERVIEW</div>
            
            <div class="dashboard">

            <a href="dashboardstudent.php" class="dashB">
            <img src="../../../public/assets/images/dashboard.png" class="dashPIC">
            <label class="txtR"> VIEW VIOLATIONS</label>
        </a>

        <a href="reportstudent.php" class="dashB">
            <img src="../../../public/assets/images/report.png" class="dashPIC">
            <label class="txtR"> WRITE A REPORT</label>
        </a>

        <a href="appealStudent.php" class="dashB">
            <img src="../../../public/assets/images/gavel-xl.png" class="dashPIC">
            <label class="txtR"> WRITE AN APPEAL</label>
        </a>
    </div>

        <div class="LO">
                <a id="logout-link">
                    <img src="../../../public/assets/images/logout.png" class="dashPIC" alt="Logout">
                </a>
                <label class="txtR"> LOGOUT</label>
        </div>
        </div>
        <!-- --------------<p>sidebar</p>-------------------- -->
         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">
            <div class="content1">
                <div class="col">
                    <div class="text">
                        <label class="hello"> FILE A REPORT 
                        </label>
                    </div>
                </div>
            </div>

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
                    <label for="courseSelect">Course:</label>
                    <select type="text" id="inputcourse" class="violator" name="courseSelect" placeholder="Enter course">
                        <option value="Default" default>Course</option>
                        <option value="v1">BSIT</option>
                        <option value="v2">BSCS</option>
                        <option value="v3">BSCE</option>
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

                        
                        $dataFromPHP = [
                            ["id" => 1, "name" => "John Doe"],
                            ["id" => 2, "name" => "Jane Smith"],
                            ["id" => 3, "name" => "Bob Johnson"]
                        ];
                        $jsonData = json_encode($studentArray);
                        ?>
                        <!-- <ul>
                            <li>HTML</li>
                            <li>JAVA</li>
                            <li>CSS</li> 
                        </ul> -->
                    </div>
                </div>
                
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Describe the issue..." required></textarea>
                
                <label for="image">Attach Image (optional):</label>
                <input type="file" id="image" name="my_image">

                <input type="submit" name="submitReport" value="Submit Report">
            </form>

        </div>
    </div>

     <!-- --------------<p>mainbar</p>-------------------- -->
           
        </div>   
    </div>
    </div>
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
</body>
</html>