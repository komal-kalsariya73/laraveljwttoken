<!-- <!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <p>
            <label>Email Address:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </p>
        <button type="submit">Send Reset Link</button>
    </form>

    <p><a href="/">Back to Login</a></p>
</body>
</html> -->




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In Form</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
@if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome!</h2>
                     <p>forgot  your password.<br>For Free!</p> 
                </div>
            </div>
         

            <div class="col-right">
                <div class="login-form">
                    <h2>Forgot Password</h2>
                    <form id="forgotPasswordForm">
      
                    
                        <p> <label>Email address<span>*</span></label>   <input type="email" name="email" value="{{ old('email') }}" required></p>
                       

                       

                       
                        <p>  <button type="submit">Send Reset Link</button> </p>
                        <p>you are member? <a href="login.php">Login</a></p>
                       
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
$('#forgotPasswordForm').on('submit', function(e) {
    e.preventDefault();
    let email = $('input[name="email"]').val();

    $.ajax({
        url: '/password/forgot',
        method: 'POST',
        data: { email: email },
        success: function(response) {
            alert(response.message);
        },
        error: function(xhr) {
            alert(xhr.responseJSON.error || 'Something went wrong.');
        }
    });
});
</script>


</html>





