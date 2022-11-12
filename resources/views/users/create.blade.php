<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create Your Profile</title>
    </head>
    <body>
        <form action="/profile/store" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Create Your Profile</p>
            <p>Profile Picture</p>
                <input type="file" name="image">
            <div class="birthday">
                <p>Birthday</p>
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


