<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    {{-- get each friend the logged in user follows and display --}}
    @foreach(auth()->user()->follows as $user)
    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img src="{{$user->avatar}}" alt="avatar-image" class="rounded-full mr-3">
            {{$user->name}}
        </div>
    </li>
    @endforeach
</ul>