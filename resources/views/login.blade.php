<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Training Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="POST">
          @csrf
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="{{ route('google.login') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" placeholder="Name" id="name" name="name"/>
          <input type="email" placeholder="Email" id="email" name="email"/>
          <input type="password" placeholder="Password" id="password" name="password"/>
          <button type="submit">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form  method="POST" >
          @csrf
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="{{ route('google.login') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
          </div>
          <span>or use your account</span>
          <input type="email" placeholder="Email" id="email" name="email"/>
          <input type="password" placeholder="Password" id="password" name="password" />
          <a href="#">Forgot your password?</a>
          <button type="submit">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>FPT Training System</h1>
            <p>
                Please send us a request to create an account, we will review and respond soon in your email.
            </p>
            <button class="ghost" id="postLogin" name="postLogin">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Welcome back!</h1>
            <p>Please login via email of FPT organization with @fpt.edu.vn for quick access and authentication.</p>
            <button class="ghost" id="postRegister" name="postRegister">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      const signUpButton = document.getElementById("postRegister");
      const signInButton = document.getElementById("postLogin");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
    </script>
  </body>
</html>
