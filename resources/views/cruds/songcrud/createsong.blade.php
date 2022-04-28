<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="createsong/store">
                        @method('POST')
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name='title'> <br>
                        <label for="artist_id">Artist</label>
                        <select name="artist_id">
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select><br>
                        <label for="genre_id">Genre</label>
                        <select name="genre_id">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select><br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
