@extends('layouts.app')

@section('content')
    <h1>Create new Booking</h1>
    {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('location', 'Travel Destination')}}
            {{Form::text('location', '',['class'=> 'form-control','placeholder'=> 'Name of location'])}}
        </div>
        <div class="form-group">
            {{Form::label('booking_date', 'Date and Time you want to book', ['class' => 'col-2 col-form-label'])}}
            {{ Form::input('dateTime-local', 'booking_date', '2019-08-19T13:45:00', ['id' => 'booking_date', 'class' => 'form-control']) }}
        </div>
        {{Form::submit('Submit'), ['class'=>'btn btn-primary']}}
    {!! Form::close() !!}
@endsection