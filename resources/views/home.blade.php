@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br>
                    <strong>{{{ isset(Auth::user()->name) ? Auth::user()->name : null }}}</strong>
                    <strong>[{{{ isset(Auth::user()->email) ? Auth::user()->email : null }}}]</strong>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
