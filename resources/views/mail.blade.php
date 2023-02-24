<h1>Hello! {{ $name }}</h1>
<p>You are receiving this email because we received a password reset request for your account.</p>
<a href="localhost/laravel/resources/views/student/passwordreset.blade.php?email={{ $email }}" class="btn btn-primary">Reset Password</a>
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>
<p>Regards,</p>
<p>Laravel</p>
