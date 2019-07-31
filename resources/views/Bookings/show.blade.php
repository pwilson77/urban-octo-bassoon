@extends('layouts.app')

@section('content')
<h1> {{$booking->title}} </h1>
<small> Booked on {{ $booking->created_at}}</small>
@endsection