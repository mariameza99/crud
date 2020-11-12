<x-app-layout>
    <x-slot name="header">
    <div class="row">
            <div class="col-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
        </div>
        <div class="col-4">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMovie">Add movie</button>
        </div>    
        </div>

        <div class="modal fade" id="addMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Movie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="post" action="{{ url('movies') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Movie title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                <textarea class="form-control" rows="5" placeholder="Description of the movie" name="description"  required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Classification</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <select name="classification" class="form-control">
                                        <option value="">AA</option>
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">B15</option>
                                        <option value="">C</option>
                                        <option value="">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Minutes</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="90" name="minutes">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Year</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="2020" name="year">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cover Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="file" class="form-control" name="cover">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trailer</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Trailer example" name="trailer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <select name="category_id" class="form-control">
                                    @if (isset($categories) && count($categories)>0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add data</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <th scope="col">Category</th>
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
                        <td>{{ $movie->category->name }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>