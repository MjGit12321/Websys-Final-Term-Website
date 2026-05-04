<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #dashboard-frame {
            display: flex;
            width: 771px;
            height: 476px;
            border-radius: 44px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.15);
            background-color: #f3f3f3;
        }
        #right-cover{
            position: relative;
            border-radius: 22px;
            background-color: #003459;
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
            padding: 24px;
            box-sizing: border-box;
        }
        #right-cover img {
            max-width: 80%;
            max-height: 55%;
            object-fit: contain;
        }
        #right-cover h2 {
            color: white;
            text-align: center;
          
            line-height: 1.4;
        }
        #CoverLoginBtn {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
            padding: 10px 28px;
            cursor: pointer;
            font-size: 14px;
            width: 70%;
            margin-top: 10px;

            transition: 0.3s all;
        }
        #left-content{
            position: relative;
            height: 100%;
            width: 50%;
            margin: 10px 0;

            text-align: center;
        }

        #dashboard-frame #left-content .form{
            width: 70%;
            height: fit-content;

            text-align: left;
            margin-left: 15%;
            margin-top: 10px;
            
        }
        .login-input{
            display: block;
            width: 100%;
            box-sizing: border-box;
            height: 35px;
            margin: 3px 0px 10px 0px;

            border: none;
            background-color: #d9d9d9;
            padding-right: 40px;
        }
        .input-with-icon{
            position: relative;
            width: 100%;
        }
        #LoginBtn{
            height: 40px;
            background-color: #00A8E8;
            color: white;
            border: none;
            font-size: 15px;
            text-align: center;
            cursor: pointer;
            padding-right: 0;

            transition: 0.3s all;
        }

        #LoginBtn:hover{
            background-color: #003459;
            color: white;
        }
        p{
            margin: 10px 0;
        }
        .pass-icon{
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
        }
        .social-icons img {
            margin-right: 10px;
        }
        .social-icons img:last-child {
            margin-right: 0;
        }
        #CoverLoginBtn:hover{
            background-color: #f3f3f3;
            color: black;
        }
    </style>
</head>
<body class="center">
    <div id="dashboard-frame">
        <div id="left-content">
            <h1>Welcome!</h1>
            <h5>Sign up your account.</h5>
            <hr width="75%">

            <div class="form">
                <label for="Username">Username:</label><br>
                <input type="text" class="login-input" id="Username" value=""> 
                <label for="Password">Password:</label><br>
                <div class="input-with-icon">
                    <input type="password" class="login-input" id="Password" value="">   
                    <svg class="icon pass-icon"><use xlink:href="Icons/close.svg"></use></svg> 
                </div>
                <label for="Con-Password">Confirm Password:</label><br>
                <div class="input-with-icon">
                    <input type="password" class="login-input" id="Con-Password" value="">   
                    <svg class="icon pass-icon"><use xlink:href="Icons/close.svg"></use></svg> 
                </div>

                <input type="button" class="login-input" id="LoginBtn" value="Sign up" onclick="location.href='Log in.php'">  
            </div>

            <p>or log in using</p>
            <div class="social-icons">
                <svg class="icon"><use xlink:href="Icons/FB.svg"></use></svg>
                <svg class="icon"><use xlink:href="Icons/Gmail.svg"></use></svg>
                <svg class="icon"><use xlink:href="Icons/Tiktok.svg"></use></svg>
            </div>
            
        </div>
        <div id="right-cover">
            <img src="Pictures/Sign in pic.png" alt="" srcset="">
            <h2>Already have an account?</h2>
            <button id="CoverLoginBtn" onclick="location.href='Log in.php'">Login</button>
        </div>
    </div>
</body>
</html>