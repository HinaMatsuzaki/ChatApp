<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
    </head>
    <body>
        <form action="/profile/show" method="POST" enctype="multipart/form-data">
            <h1>Profile</h1>
            <div class="profile_picture">
                <p>Profile Picture</p>
                <img src="{{ $user->image_path }}" class="rounded-circle" width="50" height="50">
            </div>
            <div class="name">
                <p>Name</p>
                <p>{{ $user->name }}</p>
            </div>
            <div class="email">
                <p>Email</p>
                <p>{{ $user->email }}</p>
            </div>
            <div class="birthday">
                <p>Birthday</p>
                <p>{{ $user->birthday }}</p>
            </div>
            <div class="first_language">
                <p>First Language</p>
                <p>{{ $languages[$user->languages_native_id-1]->name}}</p>
            </div>
            <div class="second_language">
                <p>Second Language</p>
                <p>{{ $languages[$user->languages_learn_id-1]->name}}</p>
            </div>
            <div class="hobbies">
                <p>Hobbies</p>
                    @foreach ($user->hobbies as $hobby)
                        <p>{{ $hobby->name }}</p>
                    @endforeach
            </div>
            <div class="self_introduction">
                <p>Self Introduction</p>
                <p>{{ $user->self_introduction}}</p>
            </div>
            <div>
                <div class="flex gap-3 items-end">
                    <p class="text-2xl font-bold">Following</p>
                    <span>{{$user->follows->count()}} following</span>
                </div>
    
                @foreach ($user->follows as $follow)
                    <p class="px-4 py-1 m-2 rounded bg-gray-200 border-b-4 border-gray-300 w-max">{{$follow->name}}</p>
                @endforeach
            </div>
            <div>
                <div class="flex gap-3 items-end">
                    <p class="text-2xl font-bold">Followers</p>
                    <span>{{$user->followers->count()}} followers</span>
                </div>
                @foreach ($user->followers as $follower)
                    <p class="px-4 py-1 m-2 rounded bg-gray-200 border-b-4 border-gray-300 w-max">{{$follower->name}}</p>
                @endforeach
            </div>
        </form>
        <button type="button" onclick="location.href='/profile/edit'">Edit</button>
    </body>
</html>