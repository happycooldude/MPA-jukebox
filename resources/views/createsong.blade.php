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
                        <label for="">Title</label>
                        <input type="text" name='title'> <br>
                        <select name="artist">
                            @foreach ($songs as $song)
                                <option value="{{$song->artist->id}}">{{$song->artist->name}}</option>
                            @endforeach
                        </select>
                        <select name="genre">
                            @foreach ($songs as $song)
                                <option value="{{$song->genre->id}}">{{$song->genre->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
