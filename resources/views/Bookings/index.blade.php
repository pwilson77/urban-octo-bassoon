@extends('layouts.app')

@section('content')
  <div class="container">
      <h1> Bookings </h1>
   
       
    @if(count($bookings) > 0)
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Date and time of trip</th>
                <th scope="col">Date you booked the trip</th>
                <th scope="col"> View/Edit/Delete</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($bookings as $booking)       
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $booking->location }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->created_at}} </td>
                    <td>
                        <a href="/bookings/{{$booking->id}}"> View</a> /
                        <a href="/bookings/{{$booking->id}}/edit"> Edit</a> /
                        {!! Form::open(['action' => ['BookingsController@destroy',$booking->id],'method' => 'POST', 'class' => 'd-inline']) !!}
                          {{Form::hidden('_method', 'DELETE')}}
                          {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger'] )}}
                        {!! Form::close() !!}

                    </td>
                </tr>
             @endforeach
            </tbody>
          </table>  
          {{ $bookings->links()}}
    @else
        <p> No bookings found</p>
    @endif
  </div>  
    
@endsection