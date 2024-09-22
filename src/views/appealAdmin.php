<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appeals</title>
</head>

<style>
    @font-face{
    font-family: 'pop';
    src: url(Poppins/Poppins-Bold.ttf);
    }

    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100%;
        height: 100vh;
        background-color: #E9EAF6;
    }

    .container{
        width: 100%;
        height: 100%;
        display: flex;
    }

    .sidebar{
        width: 25%;
        height: 100%;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        background-color: white;
        font-family: 'pop';
        color: #AFB1C2;
    }

    .txt1{
        margin-left: 5px;
        color: #35408E;
     }

    .logo{
        height: 70px;
        width: 60px;
        margin: 6px;           
    } /* nu logo sa header */

    .header{
        width: 100%;
        height: 100px;
        display: flex;
        align-items: center;
        padding: 30px;
        line-height: 1;
    }

    .overview{
        width: 100%;
        height: 70px;
        display: flex;
        align-items: end;
        padding-left: 30px;
        font-size: 20px;
    }

    .items{
        width: 100%;
        height: 51%;
        padding: 60px;
    }

    line{
        display: flex;
        margin-bottom: 40px;
    }
    
    .logos{
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    label{
        margin-top: 15px;
        margin-left: 5px ;
    }

    .logout{
        padding: 60px;
        display: flex;
        align-items: center;
        margin-top: 15px;
    }

    .topbar{
        background-color: white;
        width:70%;
        height: 70px;
        display: flex;
    }


    .box2{
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        background-color: white;
        width: 40%;
        height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .toplogo{
        width: 35px;
        height: 35px;
        margin: 10px;
        color: #AFB1C2;
    }

    .info{
        font-family: 'pop';
        margin-left: 10px;
        color: #AFB1C2;
        display: flex;
        align-items: center;
    }

    .info2{
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .name{
        margin-bottom: 10px;
    }

    .mainbar{
        height: 10%;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .text{
        font-family: 'pop';
        font-size: 30px;
    }

    .wrapper{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }

    .box2 {
        margin-left:50% ;
    }

    .mainbar{
        justify-content: start;
        padding: 30px;
        color: #35408E;
    }

    .wrap2{
        display: flex;
        flex-direction: row;
        height: 80%;
        width: 100%;
    }

    .wrap3{
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .wrap{
        width: 37%;
        height: 98%;
    }

    .t .t1{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .logo3{
        margin-left: 30%;
    }

    .search{
        width:38%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #E6C213;
        font-family: 'pop';
        font-size: 2.5rem;

    }

    h4{
        margin-left: 5%;
    }

.students{
    width: 70%;
    height: 450px;
    background-color: white;
    margin-left: 15%;
    margin-top: 3%;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: start;
    color: #34408D;
    font-family: 'pop';
    padding: 3%;
}

.pic{
    width: 60px;
    height: 60px;
    margin-left: 5%;
}

.baba{
    line-height: 1;
}

.up{
    display: flex;
    align-content: start;
    margin-top: 30px;
    margin-bottom: 10%;
}

.up p{
    margin-left: 30px;
    margin-top: 5px;
}

labeli{
    color: #E6C213;
    font-size: 1.5rem;
}

.form{
    display: flex;
    flex-direction: column;
    height: 50%;
    margin-top: 10px;
}

.loob{
    width: 100%;
    height: 100%;
}

.tf{
        width: 50%;
        height: 40px;
        margin: 11px 0;
        margin-left: 5px;
        transform: translateY(-50%);
        font-size: 15px;
        font-family: 'pop';
        box-sizing: border-box;
        padding: 12px, 36px, 12px, 12px;
        border-radius: 15px;
        border: 1px solid gray;
}

.tf1 {
            width: 100%;
            height: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            font-family: 'pop';
            box-sizing: border-box;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: relative;
            resize: none;
        }

.tf1 input{
        width: 100%;
        height: 100%;
        margin: 30px 0;
        transform: translateY(-50%);
        font-size: 15px;
        font-family: 'pop';
        box-sizing: border-box;
        position: relative;
        border-radius: 15px;
        background-color: rgba(255, 255, 255, 0.8); 
        margin: 5px;
    }


    .ib{
        display: flex;
        height: 20%;
        margin-bottom: 15px;
    }


    .send-button {
            position: absolute;
            bottom: 107px;
            right: 210px;
            width: 120px;
            height: 40px;
            background-color: #E6C213;
            border-radius: 25px;
            color: white;
            font-family: 'pop';
            font-size: 1.2rem;
            border: none;
            cursor: pointer;
        }

        .email{
            margin-left: 5.5%;
        }

        textarea{
            margin-top: 10px;
        }

</style>

<body>
<div class="container">

<div class="sidebar">

    <div class="header">
        <img src="../PHPLOGIN/images/NU_shield.svg.png" class="logo">
        <h3 class="txt1">NATIONAL <BR> UNIVERSITY</h3> 
    </div> 
    
    <div class="overview">
        <label> OVERVIEW </label>
    </div>
    
    <div class="items">
        <line>
            <a href="dashboardAdmin.php"><img src="../PHPLOGIN/images/dashboard.png" class="logos"></a>
            <label> DASHBOARD</label>
        </line>
        
        <line>
            <a href="reportsAdmin.php"><img src="../PHPLOGIN/images/report.png" class="logos"></a>
            <label> REPORTS</label>
        </line>
        
        <line>
            <a href="appealAdmin.php"><img src="../PHPLOGIN/images/paper.png" class="logos"></a>
            <label> REPLY TO APPEAL</label>
        </line>
        
        <line>
            <a href="usersAdmin.php"><img src="../PHPLOGIN/images/users.png" class="logos"></a>
            <label> VIEW USER</label>
        </line>
    </div>
</div>
        <div class="wrapper">
            <div class="box2">
                <div class="info">
                    <img src="../PHPLOGIN/images/logout.png" class="toplogo">
                    <label class="name ">NAME</label>
                </div>                
                <div class="info2">
                    <img src="../PHPLOGIN/images/bell.png" class="toplogo">
                    <img src="../PHPLOGIN/images/settings.png" class="toplogo">
                </div>
            </div>


          
        <div class="search">
            <div class="rep">
                <h4>REPORTS</h4>
            </div>   
        </div>

        <div class="students">
            <div class="loob">
                <div class="apppeal">
                    <labeli>REPORT DETAILS</labeli>
                </div>
                <div class="form">
                    <div class="ib">
                        <div class="email"> To:</div>
                        <input type="text" class="tf" required>
                    </div>

                    <div class="ib">
                        <div class="email2"> Subject:</div>
                        <input type="text" class="tf" required>
                    </div>
                </div>
                <textarea type="text" class="tf1" required></textarea>
                <button class="send-button">SEND</button>
            </div>
        </div>
</div>
</div>
</body>
</html>