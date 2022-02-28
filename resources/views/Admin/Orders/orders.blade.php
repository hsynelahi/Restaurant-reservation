<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  @include('Admin.admincss')
  <body>
    <div class="container-scroller">
@include('Admin.navbar')

<div class="container">
<h1>Customer Orders</h1>

<form action="{{ route('search.admin') }}" method="GET" class="mb-4">
  <input type="text" name="search" placeholder="Search" class="text-black">
  <input type="submit" value="Search" class="btn btn-success">  
</form>


<table>
  
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Foodname</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>

  @foreach ($orders as $order)
  <tbody>
    <tr>
        <td>{{ $order->name }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->foodname }}</td>
        <td>$ {{ $order->price }}</td>
        <td>{{ $order->quantity }}</td>
        <td>$ {{ $order->price * $order->quantity }}</td>
    </tr>
  </tbody>
  @endforeach

</table>
</div>
    </div>
@include('Admin.adminjs')
  </body>
</html>
