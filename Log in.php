<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        #dashboard-frame {
            display: flex;
            width: 771px;
            height: 476px;
            border-radius: 44px;
            overflow: hidden;
            box-shadow: 0 24px 60px #00000026;
            background-color: var(--white);
        }
        #left-cover{
            position: relative;
            border-radius: 22px;
            background-color: var(--tertiary);
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
       
            padding: 20px;
            box-sizing: border-box;
        }
        #left-cover img {
            max-width: 80%;
            max-height: 55%;
            object-fit: contain;
        }
        #left-cover h2 {
            color: white;
            text-align: center;
            
            line-height: 1.4;
        }
        #SignUpBtn {
            background-color: var(--tertiary);
            color: var(--white);
            border: 2px solid var(--white);
            border-radius: 10px;
            padding: 10px 24px;
            cursor: pointer;
            font-size: 14px;
            width: 70%;

            transition: 0.3s all;
        }
        #SignUpBtn:hover{
            background-color: var(--white);
            color: var(--black);
        }
        #right-content{
            position: relative;
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding-top: 75px;

            text-align: center;
        }

        #dashboard-frame #right-content .form{
            width: 70%;
            height: fit-content;

            text-align: left;
            margin: 0 auto;
            margin-top: 10px;
            
        }
        .login-input{
            display: block;
            width: 100%;
            box-sizing: border-box;
            height: 35px;
            margin: 3px 0px 10px 0px;

            border: none;
            background-color: var(--input-bg);
            padding-right: 40px;
        }
        .input-with-icon{
            position: relative;
            width: 100%;
        }
        #LoginBtn:hover{
            background-color: var(--tertiary);
            color: var(--white);
        }
        #LoginBtn{
            height: 40px;
            background-color: var(--primary);
            color: white;
            border: none;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            padding-right: 0;
            margin: 20px 0 0 0;

            transition: 0.3s all;
        }
        p{
            margin: 16px 0;
        }
        .pass-icon{
            position: absolute;
            top: 55%;
            right: 8px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
            border: none;
            background: none;
            padding: 0;
            margin: 0;
        }
        .social-icons svg {
            margin-right: 10px;
        }
        .social-icons svg:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body class="center">
    <div id="dashboard-frame">
        <div id="left-cover">
            <img src="Pictures/Log in pic.png" alt="" srcset="">
            <h2 style="text-decoration:underline">Don't have an account?</h2>
            <button id="SignUpBtn" onclick="location.href='Sign in.php'">Sign Up</button>
        </div>
        <div id="right-content">
            <h1>Welcome back!</h1>
            <h5>Login your account.</h5>
            <hr width="75%">

            <form class="form" method="post" action="php/verify_credentials.php">
                <label for="Username">Username:</label><br>
                <input type="text" name="username" class="login-input" id="Username" value=""> 
                <label for="Password">Password:</label><br>
                <div class="input-with-icon">
                    <input type="password" name="password" class="login-input" id="Password" value="">   
                    <button type="button" class="pass-icon" onclick="togglePassword()"><svg class="icon"><use id="toggleBtn" xlink:href="Icons/Close.svg"></use></svg></button>
                </div>
                <input type="submit" class="login-input" id="LoginBtn" value="Log in">  
            </form>           
        </div>
    </div>
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/modal.css">
    <?php include 'components/modal.php'; ?>
    <?php if (isset($_GET['status'])) { ?>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const status = "<?php echo htmlspecialchars($_GET['status'], ENT_QUOTES); ?>";
                const message = "<?php echo htmlspecialchars($_GET['msg'] ?? '', ENT_QUOTES); ?>";
                const role = "<?php echo htmlspecialchars($_GET['role'] ?? '', ENT_QUOTES); ?>";

                showModal(message, status);

                // ✅ redirect after success

                if (status === "success") {
                    setTimeout(() => {
                        // 2. Use the 'role' variable we just got from the URL
                        if (role === "admin") {
                            window.location.href = "Admin Dashboard.php";
                        } else {
                            window.location.href = "Dashboard.php";
                        }
                    }, 1500); 
                }
            });
        </script>
    <?php } ?>
</body>
</html>
