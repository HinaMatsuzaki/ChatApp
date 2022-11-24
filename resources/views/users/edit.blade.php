<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Profile</title>
    </head>
    <body>
        <h1>Edit Profile</h1>
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile_picture">
                <p class="text-red-500">Profile Picture</p>
                <img src="{{ $user->image_path }}" class="rounded-circle" width="50" height="50">
                <input type="file" name=image_path value={{ $user->image_path }}>
            </div>
            <div class="name">
                <p>Name</p>
                <input type="text" name=user[name] value={{ $user->name }}>
            </div>
            <div class="email">
                <p>Email</p>
                <input type="text" name=user[email] value={{ $user->email }}>
            </div>
            <div class="birthday">
                <p>Birthday</p>
                <input type="date" name=user[birthday] value={{ $user->birthday }}>
            </div>
            <div class="first_language">
                <p>First Language</p>
                <select name="user[languages_native_id]">
                    <option value="" disabled selected>{{ $languages[$user->languages_native_id-1]->name }}</option>
        　           @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="second_language">
                <p>Second Language</p>
                <select name="user[languages_learn_id]">
                    <option value="" disabled selected>{{ $languages[$user->languages_learn_id-1]->name }}</option>
        　           @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="hobbies">
                <p>Hobbies</p>
                <select name="hobbies[]" multiple>
        　           @foreach($hobbies as $hobby)
                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="self_introduction">
                <p>Self Introduction</p>
                <p>{{ $user->self_introduction }}</p>
                <input type="text" name=user[self_introduction] value="{{ $user->self_introduction }}">
            </div>
            <input type="submit" value="Update">
        </form>
    </body>
</html>