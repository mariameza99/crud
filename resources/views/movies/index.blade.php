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
                                    <input type="text" class="form-control" placeholder="Movie title" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                <textarea class="form-control" rows="5" placeholder="Description of the movie" name="description" id="description"  required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Classification</label>
                                <div class="input-group mb-3">
                                    <select name="classification" id="classification" class="form-control">
                                        <option value="AA">AA</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B15">B15</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Minutes</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="90" id="minutes" name="minutes">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Year</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="2020" id="year" name="year">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cover Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trailer</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Trailer example" id="trailer" name="trailer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <select name="category_id" class="form-control" id="category">
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
                        <th scope="col">Actions</th>
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
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a onclick="edit('{{ $movie->id }}')" data-toggle="modal" data-target="#editMovie" class="dropdown-item" href="#">Edit Movie</a>
                            </div>
                            </div></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="{{ url('categories') }}" onsubmit="">
        @csrf
        @method('PUT') 
        <div class="modal-body">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Category example" aria-label="Category example" aria-describedby="basic-addon1" id="name" name="name">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <textarea class="form-control" rows="5" placeholder="Description of the category" name="description" id="description" required=""></textarea>
        </div>

        </div>

        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-primary">Update data</button>
         <input type="hidden" name="id" id="id">
        </div>
      </form>

    </div>
  </div>
</div>

<x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            
         function editMovie(id){
             axios.get('{{ url('movies-info') }}/'+id)
             .then(function (response){
                 var data = response.data;
             })
         }   

        </script>
    </x-slot>

</x-app-layout>