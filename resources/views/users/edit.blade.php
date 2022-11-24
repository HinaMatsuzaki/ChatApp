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
    <body class="font-sans antialiased bg-gray-100">
        <p class="px-20 py-7 m-4 text-4xl mx-20 -mb-5 font-bold text-white rounded-md bg-[#fecdd3] flex justify-center">Edit Profile</p>
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="py-12 px-10 h-[600px]">
                <div class="mx-10 my-5 pr-20 rounded-md bg-white h-full mb-3 shadow-lg p-4">
                    <div class="flex flex-row items-center space-x-40">
                        <!--Profile Picture-->
                        <div class="ml-20 -mr-60">
                            <p class="px-4 py-1 mr-40 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Profile Picture</p>
                            <img src="{{ $user->image_path }}" class="rounded-circle" width="160" height="160">
                            <input type="file" name=image_path value={{ $user->image_path }}>
                        </div>
                        <div class = "grid grid-flow-row grid-cols-2">
                        <!--Name-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Name</p>
                            <input class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" type="text" name=user[name] value={{ $user->name }}>
                        <!--Email-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Email</p>
                            <input class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" type="text" name=user[email] value={{ $user->email }}>
                        <!--Birthday-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Birthday</p>
                            <input class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" type="date" name=user[birthday] value={{ $user->birthday }}>
                        <!--Native-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Native</p>
                            <select class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" name="user[languages_native_id]">
                                <option value="" disabled selected>{{ $languages[$user->languages_native_id-1]->name }}</option>
                    　           @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        <!--Learning-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Learning</p>
                            <select class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" name="user[languages_learn_id]">
                                <option value="" disabled selected>{{ $languages[$user->languages_learn_id-1]->name }}</option>
                    　           @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        <!--Hobbies-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Hobbies</p>
                            <select class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" name="hobbies[]" multiple>
                    　           @foreach($hobbies as $hobby)
                                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                                @endforeach
                            </select>
                        <!--Self Introduction-->
                            <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Self Introduction</p>
                            <input class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]" type="text" name=user[self_introduction] value="{{ $user->self_introduction }}">
                        </div>
                    </div>
                </div>
            </div>
            <input class="ml-20 px-8 py-1 rounded-md shadow text-white font-bold bg-[#9ca3af] border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200" type="submit" value="Update">
        </form>
    </body>
</html>
