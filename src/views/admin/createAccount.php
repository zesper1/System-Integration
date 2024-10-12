<!DOCTYPE html>
<?php
    include "../../connection/db_conn.php";
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addAdmin</title>
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


    /* containers */



/* mainbar */

.content{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .content1{
        display: flex;
        width: 100%;
        height: 15%;
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

    .rep{
        width: 50%;
        display: flex;
    }

    .input-box1{
    width: 130px;
    border-radius: 10px;
    color: #34408D;
    margin-top: 10px;
} 

.input-box1 select {
    display: flex;
    align-items: center;
  width: 100%;
  height: 35px;
  cursor: pointer;
  font-size: 15px;
  font-family: 'pop';
  color: black;
  background-color: white;
}

.input-box1 select::after {
  content: '\25BC'; 
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 12px;
  color: #999;
}

.input-box1 select option {
  text-align: center; 
}

.glass {
  width: 250px; 
  background-color: white;
  display: flex; 
  align-items: center; 
  padding: 0 15px;
  margin-top: 10px;
  height: 35px;
  margin-left: 10px;
}

.glass input {
  border: none;
  outline: none;
  background: transparent;
  width: 100%;
  font-size: 16px;
  font-family: 'pop';
  color: black;
}

.glass input::placeholder {
    color: black;
}

.con1{
        display: flex;
        height: 100%;
        width: 100%;
    }

    .content2{
        width: 60%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    
.pupil{
    width: 60%;
    height: 20%;
    background-color: white;
    border-radius: 10px;
    align-items: center;
    display: flex;
    flex-direction: column;
    color: #34408D;
    font-family: 'pop';
    outline: 1px solid black;
    justify-content: center;
    margin-bottom: 2%;
}

.baba{
    display: flex;
    margin-left: 10px ;
}

.studpic{
    width: 40px;
    height: 40px;
}

.det{
    width: 100%;
        height: 70%;
        display: flex;
        justify-content: start;
        align-items: center;
}

.details{
    width: 80%;
    height: 100%;
    background-color: white;
    margin-top: 6%;
    font-family: 'pop';
    outline: 1px solid black;
    color: #34408D;
    padding: 3%;
}


.reportPIC .studpic{
    width: 100px;
    height: 100px;
    margin-bottom: 5%;
}

.reportDetails{
    text-align: justify;
    margin-bottom: 5%;
}
.case{
    text-align: justify;
    margin-top: 1%;
}

.formcon{
          display: flex;
    justify-content: center;
    height: fit-content;
    
        }
        .form {
            background-color: white;
            width: 60%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #34408D;
            margin-bottom: 20px;
        }

        .form-table {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .form-table label {
            display: block;
            font-weight: bold;
            color: #34408D;
            margin-bottom: 5px;
        }

        .form-table input[type="text"],
        .form-table input[type="email"],
        .form-table input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'pop', sans-serif;
        }

        .form-table .full-width {
            grid-column: span 3;
        }

        .form-table .half-width {
            grid-column: span 2;
        }

        /* Dropdown style to match input fields */
.form-table select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-family: 'pop', sans-serif;
    font-size: 16px;
    color: #34408D;
    background-color: white;
    appearance: none; /* Removes default dropdown arrow for a custom appearance */
}

.form-table select:focus {
    outline: none;
    border-color: #34408D;
}

.form-table select::after {
    content: '\25BC'; /* Adds a custom dropdown arrow */
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    color: #34408D;
    pointer-events: none;
}

.form-table select option {
    text-align: center;
}


        .submit-btn {
            background-color: #34408D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-family: 'pop', sans-serif;
            font-size: 16px;
            text-align: center;
            display: block;
            width: 100px;
            margin-left: auto;
        }

        .submit-btn:hover {
            background-color: #2b3675;
        }
</style>

<body>
    <div class="container">




         
        <!-- --------------<p>mainbar</p>-------------------- -->

        <div class="content">

            <div class="formcon">
            <div class="form">
                <h2>Create an Account</h2>
                <form action="addAdmin.php" method="post">
                    <div class="form-table">
                        <div>
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                        <div>
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div>
                            <label for="middleName">Middle Name:</label>
                            <input type="text" id="middleName" name="middleName">
                        </div>
                        <div>
                            <label for="adminEmail">Email:</label>
                            <input type="email" id="adminEmail" name="adminEmail" required>
                        </div>
                        <div>
                            <label for="adminPassword">Password:</label>
                            <input type="password" id="adminPassword" name="adminPassword" required>
                        </div>
                        <div>
                            <label for="role">Role:</label>
                            <select id="role" name="role" required>
                                <option value="">Select an account type</option>
                                <option value="student">Student</option>
                                <option value="faculty">Faculty</option>
                            </select>
                        </div>
                        <div class="full-width">
                            <label for="department">Department:</label>
                            <input type="text" id="department" name="department" required>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Add</button>
                </form>
            </div>
            </div>

    </div>

     <!-- --------------<p>mainbar</p>-------------------- -->
           
 
    </div>
    </div>
</body>

<script>
    function navigateTo(pagename){
        window.location.href = pagename;
    }
</script>

</html>