<?php

    session_start();
    $sqluser = "onlinebook";
    $sqlpassword = "#125Yb3qf";
    $sqldatabase = "onlinebook";
    $post = $_SERVER['REQUEST_METHOD']=='POST';
    if ($post) {
        if(
            empty($_POST['uname'])||
            empty($_POST['pass'])
        ) $empty_fields = true;

        else {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=".$sqldatabase,$sqluser,$sqlpassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit($e->getMessage());
                }
                $st = $pdo->prepare('SELECT * FROM list WHERE user_name=?');
                $st->execute(array($_POST['uname']));
                $r=$st->fetch();
                if($r != null && $r["password"]==$_POST['pass']) {
                    echo $_POST["uname"];
                    echo $_POST["pass"];
                    $_SESSION["uname"] = $_POST["uname"];
                    $_SESSION["pass"] = $_POST["pass"];
                    $_SESSION["fname"] = $r["first_name"];
                    echo $_SESSION["uname"];
                    echo $_SESSION["pass"];
                    header("Location:category.php");
                    exit;
                } else $login_err = true;
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        font-size: 0.9em;
        background-color: black; /* Set the background color to black */
    }
    div {
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%);
        position:absolute;
        width:350px;
        background:#eee;
        padding:10px 20px;
        border-radius: 2px;
        box-shadow:0px 0px 10px #aaa;
        box-sizing:border-box;
    }
    input {
        display: inline-block;
        border: none;
        width:100%;
        border-radius:2px;
        margin:5px 0px;
        padding:7px;
        box-sizing: border-box;
        box-shadow: 0px 0px 2px #ccc;
    }
    #submit {
        border:none;
        background-color: blue;
        color:white;
        font-size:1em;
        box-shadow: 0px 0px 3px #777;
        padding:10px 0px;
    }
    span {
        color:red;
        font-size: 0.75em;
    }
    p {
        text-align: center;
        font-size: 1.75em;
    }
    a {
        text-decoration: none;
        color:blue;
        font-weight: bold;
    }
</style>
</head> 
<body class="blog">
<div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>Login</p>
        <label for="uname">Username</label><br>
        <input type="text" id="uname" name="uname" placeholder="Username" value="<?php echo isset($_POST['uname']) ? $_POST['uname'] : ''; ?>"><br><br>
        
        <label for="pass">Password</label><br>
        <input type="password" id="pass" name="pass" placeholder="Password"><br><br>

        <?php
        if (!empty($login_err) && $login_err) {
            echo "<span>Incorrect Username or password.</span><br><br>";
        }
        if (!empty($empty_fields) && $empty_fields) {
            echo "<span>Enter username and password.</span><br><br>";
        }
        ?>
        <input type="submit" id="submit" value="Login"><br><br>
        Don't have an account? <a href="signup.php">SignUp</a>.<br><br>
    </form>
</div>
</body>
</html>