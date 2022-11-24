<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
        </h2>
    </x-slot>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Profile</title>
        </head>
        <body>
            <form action="/profile/show" method="POST" enctype="multipart/form-data">
                <div class="py-12 px-10 h-[600px]">
                    <div class="mx-10 my-5 pr-20 bg-white h-full mb-3 shadow-lg p-4">
                        <div class="flex flex-row items-center space-x-40">
                            <!--Profile Picture-->
                            <div class="ml-20 -mr-20">
                                <img src="{{ $user->image_path }}" class="rounded-circle" width="160" height="160">
                            </div>
                            <div>
                                <div class = "grid grid-flow-row grid-cols-2">
                                <!--Name-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Name</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $user->name }}</p>
                                <!--Email-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Email</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $user->email }}</p>
                                <!--Birthday-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Birthday</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $user->birthday }}</p>
                                <!--Native-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Native</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $languages[$user->languages_native_id-1]->name}}</p>
                                <!--Learning-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Learning</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $languages[$user->languages_learn_id-1]->name}}</p>
                                <!--Hobbies-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Hobbies</p>
                                    <div class="grid grid-flow-row grid-cols-4 -ml-56">
                                        @foreach ($user->hobbies as $hobby)
                                            <p class="px-4 py-1 m-2 rounded-md bg-[#fecdd3]">{{$hobby->name}}</p>
                                        @endforeach
                                    </div>
                                <!--Self Introduction-->
                                    <p class="px-4 py-1 mr-64 m-2 font-bold text-white rounded-md border-2 border-gray-500 bg-blue-300">Self Introduction</p>
                                    <p class="px-4 py-1 -ml-56 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $user->self_introduction}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--
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
                --}}
            </form>
            <form action={{route("edit", $user->id)}} method="GET">
                @csrf
                <button class="ml-20 px-8 py-1 rounded-md shadow text-white font-bold bg-[#9ca3af] border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Edit</button>
            </form>
        </body>
</x-app-layout>
</html>