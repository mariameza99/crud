<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Classification</th>
                        <th scope="col">Minutes</th>
                        <th scope="col">Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($movies) && count($movies)>0)
                        @foreach($movies as $movie)
                        <tr>
                        <th scope="row">{{ $movie->title }}</th>
                        <td>{{ $movie->classification }}</td>
                        <td>{{ $movie->minutes }}</td>
                        <td>{{ $movie->year }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>