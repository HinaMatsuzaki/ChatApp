<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Profile</title>
    </head>
    <body>
        <h1>Edit Profile</h1>
        <form action="/profile/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile_picture">
                <p>Profile Picture</p>
                <input type="file" name=user[image_path] value={{ $user->image_path }}>
            </div>
            <div class="name">
                <p>Name</p>
                <input type="text" name=user[name] value={{ $user->name }}>
            </div>
            <div class="email">
                <p>Email</p>
                <input type="text" name=user[email] value={{ $user->email }}>
            </div>
            <input type="submit" value="Update">
        </form>
    </body>
</html>