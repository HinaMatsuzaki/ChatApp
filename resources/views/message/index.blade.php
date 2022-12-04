<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chats
        </h2>
    </x-slot>
    
    <div class="ml-20 mt-10 mb-5">
        <p class="font-bold text-2xl">Friends</p>
    </div>
    <div>
        @foreach ($users as $user)
            @if ($user->id != auth()->id())
                <div class="flex items-center justify-between px-10 py-4 mx-20 my-4 bg-white rounded shadow">
                    <div>{{$user->name}}</div>
                    <a href={{route("messages.show", $user->id)}} class="px-2 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Message</a>
                </div>
            @endif
        @endforeach
    </div>
    
    <div class="ml-20 mt-10 -mb-10">
        <p class="font-bold text-2xl">Follow Requests</p>
    </div>
    
    <div class="py-12">
        <div class = "grid grid-flow-row grid-cols-2">
            @foreach ($follow_requests as $follow_request)
                @if ($follow_request->id != auth()->id())
                    <div class = "flex items-center justify-between px-10 py-4 mx-20 my-4 bg-white rounded shadow">
                        <div class="flex-none">
                            <img src="{{ $follow_request->image_path }}" class="rounded-circle" width="60" height="60">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-xl text-gray-800 leading-tight">{{$follow_request->name}}</p>
                            <div class="flex flex-row space-x-5">
                                <div class="flex flex-row space-x-2">
                                    <p>Native:</p>
                                    <p>{{ $languages[$follow_request->languages_native_id-1]->name}}</p>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <p>Learning:</p>
                                    <p>{{ $languages[$follow_request->languages_learn_id-1]->name}}</p>
                                </div>
                            </div>
                            <div class = "grid grid-flow-row grid-cols-2">
                                @foreach ($follow_request->hobbies as $hobby)
                                    <p class="px-4 py-1 m-2 rounded-md bg-[#fecdd3]">{{$hobby->name}}</p>
                                @endforeach
                            </div>
                            <p class="px-4 py-1 m-2 rounded-md border-2 border-[#cbd5e1]">{{ $follow_request->self_introduction}}</p>
                        </div>
                        <form action={{route("followBack", $follow_request->id)}} method="POST">
                                @csrf
                                <button class="px-2 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Follow</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>