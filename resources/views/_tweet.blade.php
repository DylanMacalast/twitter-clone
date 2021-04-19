<div class="flex p-4 border-b border-b-gray-400">
    {{-- avatar --}}
    <aside class="mr-2 flex-shrink-0">
        <img src="{{$tweet->user->avatar}}" alt="avatar-image" class="rounded-full mr-3">
    </aside>

    {{-- users name and deets --}}
    <aside>
        <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        <p class="text-sm">{{$tweet->body}}</p>
    </aside>

</div>