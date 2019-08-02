@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="row mt-5">
            <div class="col-xl-8 col-md-8">
                    <h2> List of features</h2>
                    <ul class="list-group">
                            @if (count($features) > 0)
                                @foreach ($features as $feature)
                                    <li class="list-group-item">
                                         {{ $feature->name }} /
                                         {!! Form::open(['action' => ['FeaturesController@destroy',$feature->id],'method' => 'POST', 'class' => 'd-inline']) !!}
                                             {{Form::hidden('_method', 'DELETE')}}
                                             {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger'] )}}
                                        {!! Form::close() !!}
                                     </li>                   
                                @endforeach
                            @endif
                    </ul>
            </div>
            <div class="col-xl-4 col-md-4">
                    {!! Form::open(['action' => 'FeaturesController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Add new feature')}}
                            {{Form::text('name', '',['class'=> 'form-control','placeholder'=> 'Name of feature'])}}
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
            </div>
        </div>        
    </div>
    
@endsection