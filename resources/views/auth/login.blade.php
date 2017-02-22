@extends('layouts.colate')
@section('title')
    Login
@endsection
@section('content')
    <div style="visibility: visible; animation-name: fadeInDown;" class="get-started center wow fadeInDown animated">
                    <h2>Login</h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail or Phone Number</label>

                            <div class="col-md-6">
                                <input type="text" id="data" class="form-control" onchange="validate()" name="email" value="{{ old('email') }}">
                                  <span class="help-block" >
                                        <i id="result"></i>
                                    </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>

                <script>
    function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function validatePhone(phone) {
    var re =/^(()?\d{3}())?(-|\s)?\d{3}(-|\s)?\d{4}$/;
    return re.test(phone);
}

function validate() {
  $("#result").text("");
  var mydata =document.getElementById("data").value;
  if (validateEmail(mydata)) {
    $("#result").text(email + " is valid :)");
    $("#result").css("color", "green");
  }
   else if (validatePhone(mydata)) {
    $("#result").text(phone + " is valid :)");
    $("#result").css("color", "green");
  }
    else if (mydata=="") {
    $("#result").text("Phone number or email is required");
    $("#result").css("color", "blue");
  }
  else {
    $("#result").text("Enter a valid email or phone number");
    $("#result").css("color", "red");
  }
  return false;
}
                </script>
@endsection
