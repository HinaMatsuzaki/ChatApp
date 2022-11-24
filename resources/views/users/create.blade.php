<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <form action="/profile/store" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Create Your Profile</p>
            <p>Profile Picture</p>
                <input type="file" name="image">
            <div class="birthday">
                <p class="text-red-600">Birthday</p>
                <input type="date" name="user[birthday]" value="" />
                <p class="title__error" style="color:red">{{ $errors->first('user.birthday') }}</p>
            </div>
            <div class="first_language">
                <p>First Language</p>
                <select name="user[languages_native_id]">
        　           @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
                <p class="title__error" style="color:red">{{ $errors->first('language.languages_native_id') }}</p>
            </div>
            <div class="second_language">
                <p>Second Language</p>
                <select name="user[languages_learn_id]">
        　           @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
                <p class="title__error" style="color:red">{{ $errors->first('language.languages_learn_id') }}</p>
            </div>
            <div class="hobbies">
                <p>Hobbies</p>
                <select name="hobbies[]" multiple>
        　           @foreach($hobbies as $hobby)
                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                    @endforeach
                </select>
                <p class="title__error" style="color:red">{{ $errors->first('hobbies.id') }}</p>
            </div>
            <div class="self_introduction">
                <p>Self Introduction</p>
                <input type="text" name="user[self_introduction]" value=""/>
                <p class="title__error" style="color:red">{{ $errors->first('user.self_introduction') }}</p>
            </div>
            <input type="submit" name="submit" value="Sign Up" /></p>
        </form>
    </body>
</html>





