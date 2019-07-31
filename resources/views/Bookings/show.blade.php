@extends('layouts.app')

@section('content')
    <h1>Location : {{$booking->location}} </h1>
    <small> Booked on : {{ $booking->created_at}}</small>
@endsection