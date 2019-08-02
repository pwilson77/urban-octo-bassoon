@extends('layouts.app')



@section('content')
<div class="container">
    <div class="d-flex justify-content-center mt-5"> 
        <div class="col-xl-7 col-md-7">
            <h1>Edit the trip details</h1>
            {!! Form::open(['action' => ['BookingsController@update', $booking->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('location', 'Travel Destination')}}
                    {{Form::text('location',$booking->location ,['class'=> 'form-control','placeholder'=> 'Name of location'])}}
                </div>
                <div class="form-group">
                    {{Form::label('booking_date', 'Change Date and Time ', ['class' => 'col-form-label'])}}
                    <b class="d-block"> The previously scheduled date and time is {{$booking->booking_date}} </b>
                    {{ Form::input('dateTime-local', 'booking_date', $booking->booking_date, ['id' => 'booking_date', 'class' => 'form-control', 'placeholder' => $booking->booking_date]) }}
                </div>
                <div class="form-group">
                        {!! Form::label('features[]', 'Change your customizations') !!}
                        {!! Form::select('features[]', $features->pluck('name','id')->all(), null, ['class' => 'js-multiple form-control', 'multiple' => 'multiple']) !!}
                    </div>
                <div class="form-group">
                    <b> The current status of your trip is {{ $booking->status }} </b>
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
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-multiple').select2();
            $('.js-multiple').select2().val({!! json_encode($booking->features()->allRelatedIds()) !!}).trigger('change');
        });
    </script>
@endsection
