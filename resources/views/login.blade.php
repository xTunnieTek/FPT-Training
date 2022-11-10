<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>Training Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/login.css" />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('postLogin') }}">
          @csrf
          <img src="/assets/img/fpt.png"  class="logo01">
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
        <form  method="POST" action="{{route('postLogin')}}" enctype="multipart/form-data">
          @csrf
            <span style="color: red">
                @if (session('error'))
                    {{ session('error') }}
                @endif
            </span>
          <img src="/assets/img/fpt.png"  class="logo01">
          <div class="social-container">
            <a href="{{ route('google.login') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
          </div>
          <span>or use your account</span>

          <input type="email" placeholder="Email" id="email" name="email"/>
          <input type="password" placeholder="Password" id="password" name="password" />
          <a id="forgot">Forgot your password?</a>
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
            <button class="ghost"  name="postRegister" id="postRegister" >Sign Up</button>
            {{-- Turn on thi id="postRegister" --}}
          </div>
        </div>
      </div>
    </div>

    <script>
      const signUpButton = document.getElementById("postRegister");
      const signInButton = document.getElementById("postLogin");
      const forgot = document.getElementById("forgot");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        // container.classList.add("right-panel-active");
        // Alert('System is under construction, please try again later!') and turn off after 3000ms
        if (confirm('Công Tuấn bảo chỉ đăng nhập bằng Google thôi! Đừng cố đăng nhập nữa nhé!')) {
            setTimeout(function(){ alert("Rồi nhé, cảm ơn thật đấy !"); });
        }
        else
        {
            setTimeout(function(){ alert("Đã bảo không được rồi, Đmm nữa !"); });
        }
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });

      forgot.addEventListener("click", () => {
        if (confirm('Bạn Đang Quên Mật Khẩu Đúng Không?')) {
            if (confirm('Bạn Có Nhớ Mật Khẩu Không?')) {
                setTimeout(function(){ alert("Đã Bảo Bạn Nhớ Mật Khẩu Rồi, Đmm Nữa !"); });
            }
            else
            {
                setTimeout(function(){ alert("Hãy Cố Gắng Nhớ Lại, Ngày Sinh Nhật Của Bạn Hay Người Yêu Cũ Đi !"); });
            }
        }
        else
        {
            setTimeout(function(){ alert("Đã bảo không được rồi, Đmm nữa !"); });
        }
      });

    </script>

  </body>
</html>
