<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row space-x-6">
                <form action={{route('messages.index')}} method="GET">
                    @csrf
                    <button class="px-4 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">Back</button>
                </form>
                <p>{{ $user->name }}</p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12 px-10 h-[600px]">
        <div class="mx-10 bg-white h-full mb-3 shadow-lg p-4">
            @foreach ($messages as $message)
                @if ($message->sender_id == auth()->id())
                    <div class="flex items-center gap-2">
                        <div class="bg-[#fecdd3] w-max px-3 py-1 my-2 rounded-md">
                            {{$message->message}}
                        </div>
                        <div class="text-xs">{{$message->created_at}}</div>
                    </div>

                @else
                    <div class="flex items-center gap-2">
                        <div class="ml-auto text-xs">{{$message->created_at}}</div>
                        <div class="bg-white border border-gray-300 w-max px-3 py-1 my-2 rounded-md">
                            {{$message->message}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
            <form class="flex gap-2" action={{route("messages.store")}} method="POST">
                @csrf
                {{-- messageと一緒に保存したいが画面には見せたくないデータはhiddenで隠してある。Controller側で値を設定することも可能だが、こっちの方が楽。 --}}
                <input value={{$receiver_id}} name="receiver_id" class="hidden">
                <input value={{auth()->id()}} name="sender_id" class="hidden">

                <textarea class="mx-10 w-full" name="message"></textarea>
                <button type="submit" class="mr-10 px-4 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">✔️</button>
            </form>
    </div>
</x-app-layout>