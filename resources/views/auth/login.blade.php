<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login {{$type}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('authAssets/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section" style="color: #ff6f61">Login : {{$type}}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        @if($type == 'customer')
                            <h3 class="text-center mb-4"><a href="{{route('register.form')}}">Create an account?</a></h3>
                        @endif
                        <!-- ... (previous code) ... -->

                        <form method="POST" action="{{ route('login') }}">
                            @csrf 

                            <input type="hidden" value="{{$type}}" name="type"/>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-left" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <!-- Corrected id attribute to "password" -->
                                <input type="password" name="password" id="password" class="form-control rounded-left" placeholder="Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="showPasswordToggle" onclick="myFunction()">
                                <label class="custom-control-label" for="showPasswordToggle">Show password</label>
                            </div>
                            <div class="form-group d-flex">
                                <button type="submit" class="btn btn-primary rounded submit p-6 px-19" style="background-color: #ff6f61; color: #ffffff;">Login</button>
                            </div>
                            
                        </form>

<!-- ... (remaining code) ... -->


                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>

