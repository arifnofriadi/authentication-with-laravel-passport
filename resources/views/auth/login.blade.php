<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Back Office | Login</title>

    <link href="{{asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('style/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/build/css/custom.min.css')}}" rel="stylesheet">

    @vite('resources/js/app.js')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{url('/login')}}" method="post">
                {{ @csrf_field() }}

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }} <i class="fa fa-times nav navbar-right" data-dismiss="alert"></i>
                    </div>
                @endif

                @if(count($errors))
                    @foreach($errors->all() as $errors)
                        <div class="alert alert-danger">
                          {{$errors}} <i class="fa fa-times float-right" data-dismiss="alert"></i>
                        </div>
                    @endforeach
                @endif

              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"/>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Back Office</h1>
                  <p>&copy; <span id="year"></span> All Rights Reserved. Back Office. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Back Office</h1>
                  <p>&copy;<span id="year"></span> All Rights Reserved. Back Office. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
    document.getElementById('year').innerHTML = new Date().getFullYear();
</script>
