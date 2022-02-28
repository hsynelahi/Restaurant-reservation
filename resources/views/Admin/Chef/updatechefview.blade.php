<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  <body>
    <div class="container-scroller">
@include('Admin.navbar')



<form action="{{ route('updatechef.admin',$chef->id) }}" method="POST" enctype="multipart/form-data" class="col-6">
    @csrf
    @method('put')
    <div class="form-group mt-5 pl-5">
      @include('error.error')
  
  
      <label class="mt-3">Name</label>
      <input type="text" name="name" placeholder="Name" class="form-control text-white mt-3" value="{{ $chef->name }}">
  
      <label class="mt-3">Speciality</label>
      <input type="text" name="speciality" placeholder="Speciality" class="form-control text-white mt-3" value="{{ $chef->speciality }}">
  
      <label class="mt-3 mb-2">Current Image</label>
      <img src="/images/{{ $chef->image }}" alt="chefimage" width="100px" height="100px" name="current_image">

      <label class="mt-3">New Image</label>
      <input type="file" name="image" class="cunstom-file-input mt-3" required>

      <input type="submit" name="submit" value="Update" class="btn btn-success mt-3">
  
      </div>

  </form>


    </div>
@include('Admin.adminjs')
  </body>
</html>
