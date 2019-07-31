@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Location : {{$booking->location}} </h1>
    <small> Booked on : {{ $booking->created_at}}</small>
    </div>
@endsection