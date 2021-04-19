<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
<form action="/tweets" method="POST">
    @csrf
    <textarea name="body" id="tweet-body" placeholder="What's news?" class="w-full"></textarea>
    <hr class="my-4">

    <footer class="flex justify-between">
        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Post Tweet!</button>
        <img src="{{auth()->user()->avatar}}" alt="avatar-image" class="rounded-full mr-3">
    </footer>
</form>
{{-- if body is empty and user trys to tweet --}}
@error('body')
<p class="text-red-500 text-sm mt-2">{{$message}}</p>
@enderror
</div>