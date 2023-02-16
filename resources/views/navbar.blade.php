<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
</head>

<body>

    <div class="topnav">
        <a class="active" href="/">Home</a>
        <a href="view-list">All Category</a>
        <a href="new-arrival">New Arrivals</a>
        <div class="search-container">
            {{-- <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form> --}}
        </div>
        <div class="login">
            <button class="loginbtn">Account</button>
            <div class="login-content">
                <a href="#">{{ Auth()->user()->name }}</a>
                <a href="profile"><i class="lar la-user-circle"></i>My Profile</a>
                <a href="#"><i class="las la-box"></i> Orders</a>
                <a href="#"><i class="las la-heart"></i> Wishlist</a>

                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"></div>
                    @auth

                        <a href="{{ url('logout') }}" class="btn btn-danger"><i class="las la-sign-out-alt"></i> Logout</a>
                    @else
                        <a href="{{ url('login') }}" class="btn btn-primary"><i class="las la-key"></i> Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-info"><i class="lar la-registered"></i>
                                Register</a>
                        @endif
                    @endauth
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    @include('navjs')
</body>

</html>
