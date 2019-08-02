@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="d-flex justify-content-center mt-5"> 
                    <div class="col-xl-7 col-md-7">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                              <h5 class="card-title">TRIP DETAILS</h5>
                              <hr>
                              <h6 class="card-subtitle mb-2 text-muted">Trip Location : {{$booking->location}}</h6>
                              <hr>
                              <h6 class="card-subtitle mb-2 text-muted">Booked Trip on : {{ $booking->created_at}}</h6>
                              <hr>
                              <h6 class="card-subtitle mb-2 text-muted">Date of trip : {{ $booking->booking_date}}</h6>
                              <hr>
                              <p class="card-text">
                                <h6>Trip features </h6>
                                    @foreach ($booking->features as $feature)
                                        <span class="badge badge-info">{{$feature->name}}</span>
                                     @endforeach
                              </p>                             
                            </div>
                          </div>                        
                    </div>
            </div>
    </div>
@endsection