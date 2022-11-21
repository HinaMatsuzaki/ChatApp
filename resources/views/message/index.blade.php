<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chats
        </h2>
    </x-slot>
    
    <h2>Friends</h2>
    <div>
        @foreach ($users as $user)
            @if ($user->id != auth()->id())
                <div class="flex items-center justify-between px-10 py-4 mx-20 my-4 bg-white rounded shadow">
                    <div>{{$user->name}}</div>
                    <a href={{route("messages.show", $user->id)}} class="bg-red-500 text-white py-1 px-3 rounded border-b-4 border-red-700 active:scale-95 active:border-opacity-10">Send Message</a>
                </div>
            @endif
        @endforeach
    </div>
    
    <h2>Follow Requests</h2>
    <div class="py-12">
        <div>
            @foreach ($follow_requests as $follow_request)
                @if ($follow_request->id != auth()->id())
                    <div class="flex items-center justify-between px-10 py-4 mx-20 my-4 bg-white rounded shadow">
                        <div>{{$follow_request->name}}</div>
                        <div class="profile_picture">
                        <img src="{{ $follow_request->image_path }}" class="rounded-circle" width="50" height="50">
                        <p>{{ $languages[$follow_request->languages_native_id-1]->name}}</p>
                        <p>{{ $languages[$follow_request->languages_learn_id-1]->name}}</p>
                        @foreach ($follow_request->hobbies as $hobby)
                            <p>{{ $hobby->name }}</p>
                        @endforeach
                        <p>{{ $follow_request->self_introduction}}</p>
                        <form action={{route("followBack", $follow_request->id)}} method="POST">
                                @csrf
                                <button class="px-2 py-1 rounded-md font-bold bg-blue-500 text-white shadow hover:bg-opacity-70 active:scale-95 duration-200">Follow</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>