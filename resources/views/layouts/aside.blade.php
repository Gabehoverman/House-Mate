<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>House Mate - Multi Tenant House Management Software</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../bulma/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="../bulma/css/aside.css">
    <link rel="shortcut icon" href="../assets/img/Favicon.png" type="image/x-icon">
</head>
<body>
<nav class="nav is-dark has-shadow" id="top">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" href="/">
                <img src="../assets/img/HouseMateLogo.png">
            </a>
        </div>
        <div class="nav-right">
            <a class="nav-item" href="/admin/logout">
                <p class="white">Logout</p>
            </a>
        </div>

      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>
        <div class="nav-right nav-menu is-hidden-tablet">
            <a href="/admin/dashboard" class="nav-item is-tab">
                Dashboard
            </a>
            <a href="/admin/bills" class="nav-item is-tab">
                Bills
            </a>
            <a href="/admin/payments" class="nav-item is-tab">
                Payments
            </a>
            <a href="/admin/tenants" class="nav-item is-tab">
                Tenants
            </a>
            <a href="/admin/settings" class="nav-item is-tab">
                Settings
            </a>
        </div>
    </div>
</nav>
<div class="columns">
    <aside class="column is-2 aside hero is-fullheight is-hidden-mobile">
        <div>
            <div class="uploader has-text-centered">
                <a href="/admin/settings" class="button">
                    <h1 class="user-title">{{Auth::user()->name}}</h1>
                </a>
            </div>
            <div class="main">
                <div class="title">Main</div>
                <div class="nav-wrapper">
                <a href="/admin/dashboard" class="item active"><span class="icon"><i class="fa fa-home"></i></span><span class="name">Dashboard</span></a>
                <a href="/admin/bills" class="item active"><span class="icon"><i class="fa fa-file-text"></i></span><span class="name">Bills</span></a>
                <a href="/admin/payments" class="item active"><span class="icon"><i class="fa fa-credit-card"></i></span><span class="name">Payments</span></a>
                <a href="/admin/tenants" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Tenants</span></a>
                <a href="/admin/settings" class="item active"><span class="icon"><i class="fa fa-cog"></i></span><span class="name">Settings</span></a>
                </div>
            </div>

        @if (Auth::user()->role == 'Admin')
            <div class="main">
                <div class="title">Admin</div>
                <div class="nav-wrapper">
                    <div><a href="/admin/dashboard" class="item active"><span class="icon"><i class="fa fa-home"></i></span><span class="name">Dashboard</span></a></div>
                    <a href="/admin/bills" class="item active"><span class="icon"><i class="fa fa-file-text"></i></span><span class="name">Bills</span></a>
                    <a href="/admin/payments" class="item active"><span class="icon"><i class="fa fa-credit-card"></i></span><span class="name">Payments</span></a>
                    <a href="/admin/tenants" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Tenants</span></a>
                    <a href="/admin/settings" class="item active"><span class="icon"><i class="fa fa-cog"></i></span><span class="name">Settings</span></a>
                </div>
            </div>
            </div>
        @endif
    </aside>
    @yield('content')

    <script async type="text/javascript" src="../bulma/js/bulma.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function(){
            var current = location.pathname;
            $('.main div a').each(function(){
                var $this = $(this);
                // if the current path is like this link, make it active
                if($this.attr('href').indexOf(current) !== -1){
                    $this.addClass('active-nav');
                }
            })
        })
    </script>
</div>
</body>
</html>