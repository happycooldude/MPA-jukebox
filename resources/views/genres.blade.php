<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($genres as $genre)
                    <a href="/genre/{{$genre->id}}">{{ $genre->name }}</a> 
                    <a href="/genre/edit/{{ $genre->id }}">Edit</a>
                    <a href="/genre/delete/{{ $genre->id }}">Delete</a>
                    <br>
                    @endforeach

                    <a href="/genres/creategenre">Add genre</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
