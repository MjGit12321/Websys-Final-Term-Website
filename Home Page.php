<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #main-frame {
            background-color: var(--tertiary);
            height: 476px;
            width: 771px;
            border-radius: 44px;
            top: 0px;

            text-align: center;
        }
        h1 {
            color: var(--white);
            margin-top: -30px;
        }
        button{
            height: 50px;
            width: 338px;

            background-color: #FFDF3E;
            border-radius: 10px;
            font-size: 20px;
            font-weight:bold;

            transition: 0.3s all;
        }
        button:hover{
            background-color: var(--white);
        
        }
    </style>
</head>
<body class="center">
    <div id="main-frame">
        <img src="Pictures/Home Page Pic.png" height="331px" width="586px" alt="">
        <h1>“Shop smart, save more, and get your <br> 
favorite products delivered fast.”</h1>
        <button type="button" onclick="location.href='Log in.php'">Shop Now!</button>
    </div>
</body>
</html>