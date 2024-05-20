<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('admin.css') }}">
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <h3>Admin Menu</h3>
            <ul>
                <li><a href="{{ route('admin.index') }}">Overview</a></li>
                <li><a href="{{ route('admin.animes') }}">View Animes</a></li>
                <li><a href="{{ route('admin.animes.create') }}">Insert Anime</a></li>
                <li><a href="{{ route('admin.users') }}">All Users</a></li>
                <li><a href="{{ route('admin.admins') }}">All Admins</a></li>
            </ul>
        </div>
        
        <div class="content">
            {{$slot}}
        </div>

    </div>
</body>
</html>
