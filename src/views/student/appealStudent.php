<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StudentViolation.css"/>
    <title>Student Violation</title>
</head>

<style>

@font-face{
    font-family: 'pop';
    src: url(Poppins/Poppins-Bold.ttf);
    }   
    
*{
    padding:0;
    margin: 0;
    box-sizing: border-box;     
}

body{
    width: 100%;
    height: 100%;
}

@font-face{
    font-family: 'pop';
    src: url(Poppins/Poppins-Bold.ttf);
    }   
    
*{
    padding:0;
    margin: 0;
    box-sizing: border-box;     
}

body{
    width: 100%;
    height: 100%;
}

.container{
    width: 100%;
    height: 100vh;   
    background-color: #E9EAF6; 
    font-family: 'pop';
    color: #35408E;
    display: flex;
}

.sidebar{
    background-color: whitesmoke;
    width: 25%;
    height: 100%;
    border-top-right-radius: 5%;
    border-bottom-right-radius: 5%;
}

.sidebar .logo{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: start;
    justify-content: left;
}

.sidebar .pic{

    width: 50px;
    height: 60px;
    margin-right: 10px;
    margin-left: 50px;
    margin-top: 30px;
    
    }
    
.sidebar .NU{
    line-height: 1;
    font-size: 20px;
    margin-top: 40px;
}

.sidebar .overview{
    width: 100%;
    height: 10px;
    font-size: 15px;
    display: flex;
    align-items: start;
    justify-content:left;
    color: #AFB1C2;
    margin-top: 50px;
    margin-left: 50px;

}

.sidebar .container2{
    width: 100%;
    height: 50%;  
    margin-top: 50px;  
}

.container2 .warn{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    margin-top: 10px;

}

.container2 .warnPIC{
    width: 30px;
    height: 30px;
    margin-left: 50px;
}

.container2 .txtW{
    font-size: 20px;
    color: gold;
    margin-left: 20px;
}

.container2 .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 30px;
}

.container2 .write{
    width: 100%;
    height: 15%;
    display: flex;
    align-items: center;
    justify-content: left;
    margin-top: 10px;

}

.container2 .writePIC{
    width: 30px;
    height: 30px;
    margin-left: 50px;
}


.sidebar .logout{
    width: 100%;
    height: 20%;
    display: flex;
    align-items: center;
    justify-content: left;
}

.sidebar .LOut{
    width: 30px;
    height: 30px;
    margin-left: 50px;
}
.sidebar .txtR{
    font-size: 20px;
    color: #595959;
    margin-left: 20px;
}

.sidebar .txtW{
    color: gold;
}


.sidebar .logout{
    width: 100%;
    height: 20%;
    display: flex;
    align-items: center;
    justify-content: left;
}

.sidebar .LOut{
    width: 30px;
    height: 30px;
    margin-left: 50px;
}
.content{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    background-color: lavender;
}

.content .student{
    background-color: whitesmoke;
    width: 35%;
    height: 50px;
    border-bottom-right-radius: 100px;
    border-bottom-left-radius: 100px;
    margin-left: 55%;
    display: flex;
    align-items: center;
    justify-content: left;
}

.student .pic1{
    width: 30px;
    height: 30px;
    color: #595959;
    margin-left: 40px;
    margin-right: 20px;
}

.student .pic2{
    width: 30px;
    height: 30px;
    color: #595959;
    margin-right: 80px
    
}

.student .profT{
    font-size: 15px;
    color: #595959;

}

.student .profPic{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 20px;
}

.table{
    width: 80%;
    height: 80%;
    background-color: white;
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    margin-left: 130px;
    margin-top: 50px;

}


.subject{
    width: 40%;
    height: 50px;
    background-color: lavender;
    margin-left: 45px;
    margin-top: 25px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: left;
}

.txtS{
    font-size: 15px;
    color: #595959;
    margin-left: 15px;
    
}

.contentA{
    width: 90%;
    height: 70%;
    margin-left: 45px;
    margin-top: 50px;
    border-radius: 15px;
    display: flex;
    align-items: start;
    background-color: lavender;
}

.txtA{
    font-size: 20px;
    color: #595959;
    margin-top: 15px;
    margin-left: 15px;
}

</style>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img src="../../public/assets/images/NU_shield.svg.png" class="pic"/>
                <p class="NU">NATIONAL <br> UNIVERSITY</p>
            </div>

            <div class="overview">OVERVIEW</div>

            <div class="container2">
                <div class="warn">
                    <img src="../../public/assets/images/warning.png" class="warnPIC"/>
                    <label class="txtW">Your Violantion</label>
                </div>
                <div class="write">
                    <img src="../../public/assets/images/write.png" class="writePIC"/>
                    <label class="txtR">Write An Appeal</label>
                </div>
            </div>
            
            <div class="logout">
                <img src="../../public/assets/images/logout.png" class="LOut">
                <p class="txtR">LOGOUT</p>
            </div>
                
           </div>

           <div class="content">
                <div class="student">
                    <img src="../../public/assets/images/settings.png" class="pic1">
                    <img src="../../public/assets/images/bell.png" class="pic2">
                    <p class="profT">JOHN LUIS MAGO</p>
                    <img src="../../public/assets/images/first.jpg" class="profPic">
                </div>
            <div class="Hello">
                <text class="txt1">Hello,</text>
                <text class="txt2">John Luis!</text> 
            </div>    

            <div class="hooray">
                <text>Hooray! You Have No <br> Violation.</text>
            </div>
        </div>
        </div>
    </div>
    
</body>
</html>