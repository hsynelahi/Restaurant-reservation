<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  {{-- @include('Admin.Users.userscss') --}}
  <body>

    <div class="container-scroller">
@include('Admin.navbar')

<div class="container">
<table class="mt-5">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
      <tr>
        <td data-label="Account">{{ $user->name }}</td>
        <td data-label="Due Date">{{ $user->email }}</td>

        <form action="{{ route('deleteusers.all',$user->id) }}" method="POST">
          @csrf
          @method('delete')
          @if ($user->userType == 0)
          <td data-label="Amount"><button type="submit" class="text-danger text-decoration-none">Delete</button></td>
          @else
          <td data-label="Amount" class="text-muted">Not Allowed</td>
          @endif
        </form>
        
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
</div>

@include('Admin.adminjs')
  </body>
</html>
