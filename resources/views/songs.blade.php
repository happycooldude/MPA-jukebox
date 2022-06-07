<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($songs as $song)
                        <div class="border-b">
                            <a href="/song/{{ $song->id }}">{{ $song->title }}</a>
                            <a href="/song/edit/{{ $song->id }}">Edit</a>
                            <a href="/song/delete/{{ $song->id }}">Delete</a>
                            <a href="/session/store/song/{{$song->id}}">Add to playlist</a>
                        </div>

                        <br>
                    @endforeach

                    <a href="/songs/createsong">Add song</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
