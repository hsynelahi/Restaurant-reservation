<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  <body>
    <div class="container-scroller">
@include('Admin.navbar')


<form action="{{ route('addchef.all') }}" method="POST" enctype="multipart/form-data" class="col-6">
    <div class="form-group mt-5 pl-5">
      @include('error.error')
    @csrf
  
      <label class="mt-3">Name</label>
      <input type="text" name="name" placeholder="Name" class="form-control text-white mt-3">
  
      <label class="mt-3">Speciality</label>
      <input type="text" name="speciality" placeholder="Speciality" class="form-control text-white mt-3">
  
      <label class="mt-3">Image</label>
      <input type="file" name="image" class="cunstom-file-input mt-3">

      <input type="submit" name="submit" value="Send" class="btn btn-success mt-3">
  
      </div>

  </form>
    </div>

    <div class="mb-5">
  
        <table class="table table-light table-hover">
          <tr class="thead-dark">
            <th>Name</th>
            <th>Speciality</th>
            <th>Image</th>
            <th>Action</th>
            <th>Action2</th>

          </tr>

          @foreach ($chefs as $chef)
          <tr class="text-center">
            <td>{{ $chef->name }}</td>
            <td>{{ $chef->speciality }}</td>
            <td>
                <img src="/images/{{ $chef->image }}" alt="chefimage" width="100px" height="100px"class="mx-auto">
            </td>
            <td>
                <form action="{{ route('deleteChef.all',$chef->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
                  <a href="{{ route('updateChefView.all',$chef->id) }}" class="btn btn-success text-decoration-none text-white">Update</a>        
            </td>
        </tr>
          @endforeach
      
        </table>
      </div>


@include('Admin.adminjs')
  </body>
</html>
