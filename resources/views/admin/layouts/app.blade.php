<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Yanis Assistance</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f4f7fb;
            color: #0f172a;
        }

        .layout {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 237px;
            min-height: 100vh;
            padding: 28px 8px;
            background: linear-gradient(180deg, #0f172a, #1e3a8a);
            color: #fff;
        }

        .brand {
            font-size: 34px;
            font-weight: 900;
            margin-bottom: 42px;
        }

        .ttl {
            font-size: 14px;
            color: #b6c3df;
            margin: 22px 10px 10px;
        }

        .item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin: 4px 0;
            border-radius: 10px;
            color: #e8eefc;
            text-decoration: none;
            font-size: 15px;
            transition: .25s;
            font-weight: 600;
        }

        .item:hover {
            background: rgba(255, 255, 255, .12);
        }

        .item.active {
            background: #2563eb;
            color: #fff;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .35);
        }

        .main {
            flex: 1;
            padding: 32px;
        }

        .topbar {
            height: 82px;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(12px);
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
        }

        .menu-btn {
            width: 44px;
            height: 44px;
            border: 0;
            border-radius: 14px;
            background: #eef4ff;
            color: #1e3a8a;
            font-size: 22px;
            cursor: pointer;
        }

        .search-box {
            width: 460px;
            height: 50px;
            background: #f8fafc;
            border: 1px solid #dbe3f0;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 16px;
        }

        .search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            font-size: 16px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile div:first-child {
            text-align: left;
        }

        .profile strong {
            display: block;
            font-size: 16px;
        }

        .profile small {
            color: #64748b;
        }

        .avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #2563eb;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .dropdown {
            position: relative;
        }

        .profile-btn {
            border: 0;
            background: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .dropdown-menu {
            position: absolute;
            top: 62px;
            right: 0;
            width: 210px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 16px 35px rgba(15, 23, 42, .12);
            padding: 10px;
            display: none;
            z-index: 100;
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: #0f172a;
            font-size: 14px;
            font-weight: 600;
        }

        .dropdown-menu a:hover {
            background: #f1f5f9;
        }

        .dropdown-menu hr {
            border: 0;
            border-top: 1px solid #e2e8f0;
            margin: 8px 0;
        }

        .dropdown-menu .logout {
            color: #dc2626;
        }

        .arrow {
            font-size: 18px;
            color: #64748b;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

<script>
    const btn = document.getElementById('profileBtn');
    const menu = document.getElementById('dropdownMenu');

    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        menu.classList.toggle('show');
    });

    document.addEventListener('click', function() {
        menu.classList.remove('show');
    });
</script>

</html>