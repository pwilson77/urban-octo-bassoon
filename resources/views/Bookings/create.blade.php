@extends('layouts.app')

        @section('content')
<div class="container">

    <div class="d-flex justify-content-center mt-5"> 
        <div class="col-xl-7 col-md-7">
                <h1>Book a new trip!!</h1>
                {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('location', 'Travel Destination')}}
                        {{Form::text('location', '',['class'=> 'form-control','placeholder'=> 'Name of location'])}}
                    </div>
                    <div class="form-group">
                        {!! Form::label('features[]', 'Add your own customizations to the trip') !!}
                        {!! Form::select('features[]', $features->pluck('name','id')->all(), null, ['class' => 'js-multiple form-control', 'multiple' => 'multiple']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('booking_date', 'Date and Time you want to book', ['class' => 'col-form-label'])}}
                        {{ Form::input('dateTime-local', 'booking_date', '2019-08-19T13:45:00', ['id' => 'booking_date', 'class' => 'form-control']) }}
                    </div>
                    
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
        </div>
    </div>

        
</div>

    @endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-multiple').select2();
        });
    </script>
@endsection
