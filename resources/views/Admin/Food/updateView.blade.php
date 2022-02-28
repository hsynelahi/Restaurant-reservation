<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  <body>
    <div class="container-scroller">
      @include('Admin.navbar')
  
      <form action="{{ route('updatefood.admin',$foods->id) }}" method="POST" enctype="multipart/form-data" class="col-6">
        @csrf
        @method('put')
        <div class="form-group mt-5 pl-5">
          @include('error.error')
      
          <label class="mt-3">Title</label>
          <input type="text" name="title" placeholder="Title" class="form-control text-white mt-3" value="{{ $foods->title }}">
      
          <label class="mt-3">Description</label>
          <input type="text" name="description" placeholder="description" class="form-control text-white mt-3" value="{{ $foods->description }}">
      
          <label class="mt-3">Price</label>
          <input type="number" name="price" class="form-control text-white mt-3" value="{{ $foods->price }}">
      
          <label class="mt-3 mb-2">Current Image</label>
          <img src="/images/{{ $foods->image }}" alt="foodimage" width="100px" height="100px">
  
          <label class="mt-3">New Image</label>
          <input type="file" name="image" class="cunstom-file-input mt-3">
  
          <button class="btn btn-success">Update</button>
          </div>
  
      </form>
  </div>
@include('Admin.adminjs')
  </body>
</html>
