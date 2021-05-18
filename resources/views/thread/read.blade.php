@section('content')
    <h1 class="text-white text-center">Thread</h1>
    <div class="container">
        <div class="row mt-5" id="listThread">
            @foreach ($threads as $thread)
                <div class="card col-md-6 col-xl-4" style="height: 245px">
                    <div class="card-header">
                        <h5 class="card-title">{{$thread->title}}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="users"><strong>User who make the question</strong></h5>
                        <p class="questions">{{$thread->content}}</p>
                        <p class="date">{{$thread->updated_at}}</p>
                        <button><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                        <button><i class="fa fa-comment-o" aria-hidden="true"></i></button>
                        <div class="tags">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection