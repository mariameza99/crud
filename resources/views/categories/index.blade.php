<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created</th>
                        <th scope="col">Movies</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($categories) && count($categories)>0)
                        @foreach($categories as $category)
                        <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ count($category->movie) }}</td>
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a onclick="edit('{{ $category->id }}','{{ $category->name }}','{{ $category->description }}')" data-toggle="modal" data-target="#editCategory" class="dropdown-item" href="#">Edit</a>
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
    
    <div class="modal fade" id="editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <script type="text/javascript">
            function edit(id,name,description){
                $("#name").val(name)
                $("#description").val(description)
                $("#id").val(id)
            }
        </script>
    </x-slot>

</x-app-layout>