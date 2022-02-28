{{-- @auth
 <x-app-layout>

 </x-app-layout>
@endauth --}}

<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  <body>
    <div class="container-scroller">
@include('Admin.navbar')

@include('Admin.body')

    </div>

@include('Admin.adminjs')
  </body>
</html>
