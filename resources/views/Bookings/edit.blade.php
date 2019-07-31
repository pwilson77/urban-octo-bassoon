@extends('layouts.app')

@section('content')
    <h1>Edit your Booking</h1>
    {!! Form::open(['action' => ['BookingsController@update', $booking->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('location', 'Travel Destination')}}
            {{Form::text('location',$booking->location ,['class'=> 'form-control','placeholder'=> 'Name of location'])}}
        </div>
        <div class="form-group">
            {{Form::label('booking_date', 'Change Date and Time ', ['class' => 'col-2 col-form-label'])}}
            {{ Form::input('dateTime-local', 'booking_date', $booking->booking_date, ['id' => 'booking_date', 'class' => 'form-control', 'placeholder' => $booking->booking_date]) }}
        </div>
        <div class="form-group">
            {{Form::select("status",['Cancel' => 'Cancel', 'Hold' => 'Hold'], $booking->status,
             [
                "class" => "form-control",
                "placeholder" => "Change the status of your booking..."
             ])
            }}
        </div>
        {{ Form::hidden('_method','PUT') }}
        {{Form::submit('Submit'), ['class'=>'btn btn-primary']}}
    {!! Form::close() !!}
@endsection