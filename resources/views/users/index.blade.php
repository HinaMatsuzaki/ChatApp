<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Recommendations
        </h2>
    </x-slot>
        <div class="py-12">
            <div class = "grid grid-flow-row grid-cols-2">
                   @foreach ($similar_users as $user)
                        <div class = "flex items-center justify-between px-10 py-4 mx-20 my-4 bg-white rounded shadow">
                            <div class="profile_picture">
                                <img src="{{ $user->image_path }}" class="rounded-circle" width="60" height="60">
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold text-xl text-gray-800 leading-tight">{{$user->name}}</p>
                                <div class="flex flex-row space-x-5">
                                    <div class="flex flex-row space-x-2">
                                        <p>Native:</p>
                                        <p>{{ $languages[$user->languages_native_id-1]->name}}</p>
                                    </div>
                                    <div class="flex flex-row space-x-2">
                                        <p>Learning:</p>
                                        <p>{{ $languages[$user->languages_learn_id-1]->name}}</p>
                                    </div>
                                </div>
                                <div class = "grid grid-flow-row grid-cols-2">
                                    @foreach ($user->hobbies as $hobby)
                                        <p class="px-4 py-1 m-2 rounded-md bg-[#fecdd3]">{{$hobby->name}}</p>
                                    @endforeach
                                </div>
                                <p class="px-4 py-1 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $user->self_introduction}}</p>
                            </div>
                            <div class="flex flex-col space-y-3">
                                @if ($following_users_list->contains($user->id))
                                    <form action={{route("unfollow", $user->id)}} method="POST">
                                        @csrf
                                        <button class="px-2 py-1 rounded-md shadow text-white font-bold bg-[#9ca3af] border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Unfollow</button>
                                    </form>
                                    <form action={{route("send_message", $user->id)}} method="POST">
                                        @csrf
                                        <button class="px-2 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Message</button>
                                    </form>
                                @else
                                    <form action={{route("follow", $user->id)}} method="POST">
                                        @csrf
                                        <button class="px-2 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Follow</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
</x-app-layout>

