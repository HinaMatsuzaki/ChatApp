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
        <div class="mx-10 bg-white h-full mb-3 shadow-lg p-4 space-y-2 overflow-y-scroll">
            @foreach ($messages as $message)
                @if ($message->sender_id == auth()->id())
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-1 text-sm max-w-lg mx-2 order-2 items-start">
                            <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-[#fecdd3]">{{$message->message}}</span></div>
                            <div class="text-xs">{{$message->created_at}}</div>
                        </div>
                    </div>
                @else
                    <div class="flex items-end justify-end">
                        <div class="flex flex-col space-y-1 text-sm max-w-lg mx-2 order-1 items-end">
                            <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-white border border-gray-300">{{$message->message}}</span></div>
                            <div class="text-xs">{{$message->created_at}}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
            <form class="flex gap-2" action={{route("messages.store")}} method="POST">
                @csrf
                {{-- save the following data with message, but hide it from the screen --}}
                <input value={{$receiver_id}} name="receiver_id" class="hidden">
                <input value={{auth()->id()}} name="sender_id" class="hidden">

                <textarea class="mx-10 w-full" name="message"></textarea>
                <button type="submit" class="mr-10 px-4 py-1 rounded-md shadow text-white font-bold bg-blue-300 border-2 border-gray-500 hover:bg-opacity-70 active:scale-95 duration-200">✔️</button>
            </form>
    </div>
</x-app-layout>