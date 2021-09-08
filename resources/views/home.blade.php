@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tweet</label>
                            <textarea class="form-control" id="message" name="message" maxlength="250" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    @if(count($tweets) > 0)
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <h2 style="text-align: center;">Tweets</h2>
        @foreach($tweets as $tweet)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{$tweet->user->name}}</div>
                        <div class="card-body">
                            {{$tweet->message}}
                        </div>
                    </div>
                </div>
            </div><br>
        @endforeach    
    @endif
</div>
@endsection
