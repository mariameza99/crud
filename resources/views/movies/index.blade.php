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
                                    <select name="classification" class="form-control">
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
                                <a onclick="editMovie('{{ $movie->id }}')" data-toggle="modal" data-target="#editMovie" class="dropdown-item" href="#">Edit Movie</a>
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
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">
	        	Edit movie
	        </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form id="form_edit_movie" method="post" action="{{ url('movies') }}" enctype="multipart/form-data" >
	      	@csrf
	      	@method('PUT') 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Title
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" name="title" id="title" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Description
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="description of de movie" id="description" name="description"></textarea>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Classification
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" id="classification" name="classification">
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
				    <label for="exampleInputEmail1">
				    	Minutes
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" id="minutes" class="form-control" placeholder="132" name="minutes" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Year
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" id="year" class="form-control" placeholder="2000" name="year" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Cover
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="file" class="form-control" name="cover_file" >
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Trailer
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input id="trailer" type="text" class="form-control" placeholder="youtube.com" name="trailer" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Category
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select id="category_id" class="form-control" name="category_id">
					  	@if (isset($categories) && count($categories)>0)
					  	@foreach ($categories as $category)

					  		<option value="{{ $category->id}}">
					  			{{ $category->name }}
					  		</option> 

					  	@endforeach
					  	@endif 
					  </select>
					</div>
				</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">
		        	Cancel
		        </button>
		        <button type="submit" class="btn btn-primary">
		        	Save data
		        </button>
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
			  .then(function (response) { 
			  	var data = response.data;
			  	if (data.code == 200) {

			  		$("#form_edit_movie").attr('action', '{{ url('movies') }}/'+id);
			  		var movie = data.movie;
			  		$("#title").val(movie.title)
					$("#description").val(movie.description)
					$("#classification").val(movie.classification)
					$("#minutes").val(movie.minutes)
					$("#year").val(movie.year)
					$("#trailer").val(movie.trailer)
					$("#category_id").val(movie.category_id)
                    
			  	}else{
			  		//$("#editMovie").modal('hide')
			  		swal("Record not found", {
				      icon: "error",
				    });
			  	}
			    console.log(data);
			})
			  .catch(function (error) { 
			    console.log(error);
			});
		}
	</script> 
	</x-slot>

</x-app-layout>