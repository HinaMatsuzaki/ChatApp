<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Recommendations</title>
    </head>
    <body>
        <div class="user_recommendations">
            <p>User Recommendations</p>
               @foreach ($similar_users as $user)
                     <div>
                        <img src="{{ $user->image_path }}" class="rounded-circle" width="50" height="50">
                        <p>{{ $user->name }}</p>
                        <p>{{ $languages[$user->languages_native_id-1]->name}}</p>
                        <p>{{ $languages[$user->languages_learn_id-1]->name}}</p>
                        @foreach ($user->hobbies as $hobby)
                            <p>{{ $hobby->name }}</p>
                        @endforeach
                        <p>{{ $user->self_introduction}}</p>
                        @if ($following_users_list->contains($user->id))
                            <form action={{route("unfollow", $user->id)}} method="POST">
                                @csrf
                                <button class="px-2 py-1 rounded-md font-bold bg-gray-100 text-black border border-black shadow hover:bg-opacity-70 active:scale-95 duration-200">Unfollow</button>
                            </form>
                            <form action={{route("send_message", $user->id)}} method="POST">
                                @csrf
                                <button class="px-2 py-1 rounded-md font-bold bg-gray-100 text-black border border-black shadow hover:bg-opacity-70 active:scale-95 duration-200">Send Message</button>
                            </form>
                        @else
                            <form action={{route("follow", $user->id)}} method="POST">
                                @csrf
                                <button class="px-2 py-1 rounded-md font-bold bg-blue-500 text-white shadow hover:bg-opacity-70 active:scale-95 duration-200">Follow</button>
                            </form>
                        @endif
                            </div>
                @endforeach
        </div>
    </body>
</html>

