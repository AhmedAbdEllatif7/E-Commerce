<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select login type</title> <!-- Add this line with your desired title -->
    <!-- Add any additional meta tags, stylesheets, or scripts here -->
</head>
<body>
<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-card {
            font-size: large;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: relative;
            /* To position labels inside the container */
        }

        .user-img {
            width: 100px;
            height: 100px;
            border-radius: 80%;
            margin-bottom: 20px;
        }

        .admin-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .label {
            position: absolute;
            right: 100px;
            /* Adjust this value for proper positioning */
            top: 39%;
            transform: translateY(15%);
            background-color: black;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

    <div class="wrapper">
        <section class="login">
            <div class="login-container">
                <!-- Customer Login -->
                <div class="login-card">
                    <div class="img-container">
                        <a class="btn btn-default" title="Customer" href="{{ route('login.show', 'customer') }}">
                            <img class="user-img" size="100%" alt="user-img"
                                src="{{ URL::asset('assets/images/1077114.png') }}" style="width: 60px; height: 60px">
                        </a>
                    </div>
                    <div class="label">Customer</div> <!-- Label behind the image -->
                </div>
                <br>
                <br>
                <!-- Admin Login -->
                <div class="login-card">
                    <div class="img-container">
                        <a class="btn btn-default" title="Admin" href="{{ route('login.show', 'admin') }}">
                            <img class="admin-img" alt="user-img" src="{{ URL::asset('assets/images/Admin 2.png') }}">
                        </a>
                    </div>
                    <div class="label">Admin</div> <!-- Label behind the image -->
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
</body>