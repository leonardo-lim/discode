@extends('thread.main')

@section('content')
    <div class="row">
        <div class="jumbotron text-white text-center">
            <h1 class="display-4">Welcome to Discode!</h1>
            <p class="lead">where people come and share their opinion.</p>
            <hr class="my-4">
            <p>Click button below to see what people share.</p>
            <p class="lead">
            <a class="btn btn-primary btn-lg" href="/thread" role="button">See Thread</a>
            </p>
        </div>
    </div>
@endsection