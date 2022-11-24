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
        <p class="px-20 py-7 m-4 text-4xl mx-20 -mb-5 font-bold text-white rounded-md bg-[#fecdd3] flex justify-center">Create Your Profile</p>
        <form action="/profile/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="py-12 px-10 h-[600px]">
                <div class="mx-10 my-5 pr-20 rounded-md bg-white h-full mb-3 shadow-lg p-4">
                    <div class="flex flex-row items-center space-x-40">
                        <!--Profile Picture-->
                        <div class="ml-20 -mr-40">
                            <p class="px-4 py-1 mr-40 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Profile Picture</p>
                            <input type="file" name="image">
                        </div>
                        <div class = "grid grid-flow-row grid-cols-2">
                            <!--Birthday-->
                            <p class="px-4 py-1 mr-40 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Birthday</p>
                            <div>
                                <input class="px-4 py-1 -ml-20 m-2 rounded-md border-2 border-[#cbd5e1]" type="date" name="user[birthday]" value="" />
                                <p class="title__error" style="color:red">{{ $errors->first('user.birthday') }}</p>
                            </div>
                            <!--Native-->
                            <p class="px-4 py-1 mr-40 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Native</p>
                            <div>
                                <select class="px-4 py-1 -ml-20 m-2 rounded-md border-2 border-[#cbd5e1]" name="user[languages_native_id]">
                        　           @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                <p class="title__error" style="color:red">{{ $errors->first('language.languages_native_id') }}</p>
                            </div>
                            <!--Learning-->
                            <p class="px-4 py-1 mr-40 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Learning</p>
                            <div>
                                <select class="px-4 py-1 -ml-20 m-2 rounded-md border-2 border-[#cbd5e1]" name="user[languages_learn_id]">
                        　           @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                <p class="title__error" style="color:red">{{ $errors->first('language.languages_learn_id') }}</p>
                            </div>
                            <!--Hobbies-->
                            <p class="px-4 py-1 mr-40 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Hobbies</p>
                            <div>
                                <select class="px-4 py-1 -ml-20 m-2 rounded-md border-2 border-[#cbd5e1]" name="hobbies[]" multiple>
                        　           @foreach($hobbies as $hobby)
                                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                                    @endforeach
                                </select>
                                <p class="title__error" style="color:red">{{ $errors->first('hobbies.id') }}</p>
                            </div>
                        <!--Self Introduction-->
                            <p class="px-4 py-1 mr-40 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Self Introduction</p>
                            <div>
                                <input class="px-4 py-1 -ml-20 m-2 rounded-md border-2 border-[#cbd5e1]" type="text" name="user[self_introduction]" value=""/>
                                <p class="title__error" style="color:red">{{ $errors->first('user.self_introduction') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="ml-20 px-8 py-1 rounded-md shadow text-white font-bold bg-[#9ca3af] border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200" type="submit" name="submit" value="Sign Up" /></p>
        </form>
    </body>
</html>





