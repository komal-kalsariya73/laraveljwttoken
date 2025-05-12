
            
            <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                    <p>Reset your Password.<br>For Free!</p>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Reset password</h2>
                    <form action="" method="post" id="passwordResetForm">
                    
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
                    <input type="hidden" name="token" id="token" value="<?= $token ?>">
                   
                        <p> <label>Password<span>*</span></label> <input type="password" placeholder="Password" name="password" id="password" required> </p>
                        <div class="error" id="passwordError"></div>
                        <p> <label>Confim Password<span>*</span></label> <input type="password" placeholder="conPassword" name="conPassword" id="conPassword" required> </p>
                        <div class="error" id="conPasswordError"></div>
                       
                        <p> <button type="submit"  id="submitBtn">Reset Password </button></p>
                      
                    </form>
                    <div id="message" style="color:green;"></div>
                   
                </div>
            </div>
        </div>
    </div>
</body>


</html>




