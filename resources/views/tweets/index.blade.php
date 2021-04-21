@extends('layouts.app')

@section('content')
<div class="lg:flex lg:justify-between">
    <div class="lg:w-32/6">
        {{-- underscore is for convention --}}
        @include('_sidebar-links')
    </div>
    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
        @include('_publish-tweet-panel')
        <div class="border border-gray-300 rounded-lg">
            @foreach($tweets as $tweet)
                @include('_tweet')
            @endforeach
        </div>
        
    </div>
    <div class="lg:w-1/6">
        <div class="bg-blue-100 rounded p-4">
            @include('_sidebar-friends')
        </div>
    </div>
</div>
@endsection
