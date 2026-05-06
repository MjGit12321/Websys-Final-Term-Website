<!DOCTYPE php>
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
        .form .login-input{

            flex: 1;
            height: 30px;
            margin: 3px 0px 10px 0px;
            border-radius: 0px;
            border: none;
            background-color: #f3f3f3;
            border-bottom: 1px solid #ccc;
            font-size: 12px;
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
            border-radius: 10px;

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
        .form{
            font-size: 12px;
        }
        .form .form-group{
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body class="center">
    <div id="dashboard-frame">
        <div id="left-content">
            <h1>Welcome!</h1>
            <h5>Sign up your account.</h5>
            <hr width="75%">

            <form class="form" method="post" action="php/sign_in_credentials.php">
                <div class="form-group">
                    <label for="Username">Username:</label>
                    <input type="text" name="username" class="login-input" id="Username" value="">
                    <label for="Password">Password:</label>
                    <input type="password" name="password" class="login-input" id="Password" value=""> 
                </div>
                <div class="form-group">
                    <label for="Con-Password">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="login-input" id="Con-Password" value="">
                </div>
                <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" name="name" class="login-input" id="Name" value=""> 
                    <label for="Sex">Sex:</label>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female 
                </div>
                <div class="radio-group form-group">
                    <label for="Birthday">Birthday:</label>
                    <input type="date" name="birthdate" class="login-input" id="Birthday" value=""> 
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" name="email" class="login-input" id="Email" value=""> 
                    <label for="Phone">Phone_Number:</label>
                    <input type="text" name="phone" class="login-input" id="Phone" value=""> 
                </div>
                <div class="form-group">
                    <label for="Addr">Address:</label>
                    <input type="text" name="address" class="login-input" id="Addr" value=""> 
                </div>
                <div class="form-group">
                    <input type="submit" class="login-input" id="LoginBtn" value="Sign up" onclick="location.href='Log in.php'">  
                </div>
                
            </form>
        </div>
        <div id="right-cover">
            <img src="Pictures/Sign in pic.png" alt="" srcset="">
            <h2>Already have an account?</h2>
            <button id="CoverLoginBtn" onclick="location.href='Log in.php'">Login</button>
        </div>
    </div>
</body>
</html>