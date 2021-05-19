@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col text-center">
                <a href="" class="thread-tab"><i class="fa fa-fire"></i> Trending</a>
                <a href="" class="mx-3 thread-tab active"><i class="fa fa-star"></i> Latest</a>
            </div>
        </div>
        
        <div class="row my-5">
            <div class="col text-center">
                <a href="{{ url('/thread/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Thread</a>
            </div>
        </div>

        <div class="row" id="listThread">
            @foreach ($threads as $thread)
                <div class="card col-xl-3 col-md-5 p-0 mb-5 m-auto border-0" style="height: 245px">
                    <div class="bg-primary rounded-top" style="height: 10px"></div>
                    <div class="card-header bg-white">{{$thread->title}}</div>
                    <div class="card-body">
                        <h5 class="users"><strong>User who make the question</strong></h5>
                        <p class="questions">{{$thread->content}}</p>
                        <p class="date">{{$thread->updated_at}}</p>
                        <button class="btn btn-primary" title="Like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 1</button>
                        <button class="btn btn-danger" title="Dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 1</button>
                        <button class="btn btn-info text-white" title="Comment"><i class="fa fa-comment" aria-hidden="true"></i> 1</button>
                        <div class="tags">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection