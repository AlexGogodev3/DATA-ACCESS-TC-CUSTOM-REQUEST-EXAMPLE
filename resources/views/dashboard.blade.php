<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <input type="text" name="title" />
                <input type="submit" value="Add Todo" />
            </form>
            @error('title')
            <p style="color:red;">{{ $message }}</p>
            @enderror
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <ul>
                    @foreach(Auth::user()->todos as $todo)
                    <li>{{ $todo->title }} 
                        <form method="POST" action="{{ route('destroy', $todo->id) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="DELETE">
                        </form> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>