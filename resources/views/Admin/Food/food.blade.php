<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  {{-- @include('Admin.Users.userscss') --}}
<body>

  <div class="container-scroller">
    @include('Admin.navbar')

    <form action="{{ route('uploadFood.all') }}" method="POST" enctype="multipart/form-data" class="col-6">
      <div class="form-group mt-5 pl-5">
        @include('error.error')
      @csrf
    
        <label class="mt-3">Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control text-white mt-3">
    
        <label class="mt-3">Description</label>
        <input type="text" name="description" placeholder="description" class="form-control text-white mt-3">
    
        <label class="mt-3">Price</label>
        <input type="number" name="price" class="form-control text-white mt-3">
    
        <label class="mt-3">Image</label>
        <input type="file" name="image" class="cunstom-file-input mt-3">

        <input type="submit" name="submit" value="Send" class="btn btn-success mt-3">
    
        </div>

    </form>
</div>

<div class="mb-5">
  
  <table class="table table-light table-hover">
    <tr class="thead-dark">
      <th>Food Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Image</th>
      <th>Action</th>
      <th>Action2</th>
    </tr>

    @foreach ($foods as $food)
    <tr class="text-center">
      <td>{{ $food->title }}</td>
      <td>${{ $food->price }}</td>
      <td>{{ $food->description }}</td>
      <td>
        <img src="/images/{{ $food->image }}" class="mx-auto">
      </td>
      <td>
        <form action="{{ route('deleteFood.all',$food->id) }}" method="POST">
          @csrf
          @method('delete')
          <button class="btn btn-danger inline">Delete</button>
        </form>        
      </td>
      <td>
        <a href="{{ route('updateView.all',$food->id) }}" class="btn btn-success text-white text-decoration-none">Update</a>
      </td>
    </tr>
    @endforeach

  </table>
</div>



@include('Admin.adminjs')
  </body>
</html>
