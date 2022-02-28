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
            <th scope="col">Phone</th>
            <th scope="col">Guest</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Message</th>
          </tr>
        </thead>

        @foreach ($reservations as $reservation)
        <tbody>
          <tr>
              <td>{{ $reservation->name }}</td>
              <td>{{ $reservation->email }}</td>
              <td>{{ $reservation->phone }}</td>
              <td>{{ $reservation->guest }}</td>
              <td>{{ $reservation->date }}</td>
              <td>{{ $reservation->time }}</td>
              <td>{{ $reservation->message }}</td>
          </tr>
        </tbody>
        @endforeach
   
      </table>
    </div>
    </div>

@include('Admin.adminjs')
  </body>
</html>
