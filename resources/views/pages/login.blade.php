<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                    <p>Create your account.<br>For Free!</p> <a href="" class="btn">Sign Up</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="post" id="loginForm">
                        <p> <input type="hidden" placeholder="Username" name="username" id="username"> </p>
                        <p> <label>Email address<span>*</span></label> <input type="text" placeholder="Email" name="email" id="email"> </p>
                        <div class="error" id="emailError"></div>



                        <p> <label>Password<span>*</span></label> <input type="password" placeholder="Password" name="password" id="password"> </p>
                        <div class="error" id="passwordError"></div>
                         <button type="button" id="submitBtn" class="btn btn-dark pt-4">Sign In</button> 
                        <p> <a href="/forgot-password">Forgot password?</a> </p>
                    </form>
                    <div id="message" style="color:red;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#submitBtn').on('click', function () {
        // Clear old errors
        $('#emailError').text('');
        $('#passwordError').text('');
        $('#message').text('');

        let email = $('#email').val();
        let password = $('#password').val();

        // Basic front-end validation
        if (email === '') {
            $('#emailError').text('Email is required');
            return;
        }
        if (password === '') {
            $('#passwordError').text('Password is required');
            return;
        }
         $.ajax({
        url: '/api/login',
        type: 'POST',
        data: {
            email: $('#email').val(),
            password: $('#password').val()
        },
        success: function(response) {
            console.log(response);
            if (response.status) {
                // alert(response.message);

                // Save token in localStorage (for future API calls)
                localStorage.setItem('auth_token', response.token);
                console.log(localStorage.getItem('auth_token'));

                // Redirect to dashboard or load protected data
                window.location.href = '/dashboard';
            } else {
                alert('Login failed');
            }
        },
        error: function(xhr) {
            alert(xhr.responseJSON.message || 'Login error');
        }
    });

    });
</script>


</html>