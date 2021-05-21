@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col text-center">
                <a href="" class="thread-tab"><i class="fa fa-fire"></i> Trending</a>
                <a href="" class="mx-3 thread-tab active"><i class="fa fa-star"></i> Latest</a>
            </div>
        </div>
        
        <div class="row my-5">
            <div class="col text-center">
                <a href="{{ url('/thread/create') }}" class="btn btn-primary w-25"><i class="fa fa-plus"></i> Add Thread</a>
            </div>
        </div>

        <div class="row" id="listThread">
            @foreach ($threads as $thread)
                <div class="col-xl-4 col-md-6">
                    <div class="card p-0 mb-5 border-0" style="height: 300px">
                        <div class="bg-primary rounded-top" style="height: 10px"></div>
                        <a href="{{ url('/thread/edit')  . '/' . $thread->id}}" class="btn btn-warning text-white" style="position: absolute; top: -10px; right: 28px"><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="" class="btn btn-danger" style="position: absolute; top: -10px; right: -10px"><i class="fa fa-trash"></i></a>
                        <div class="card-header bg-white overflow-hidden" style="max-height: 35px">
                            @if (strlen($thread->title) > 30)
                                {{ substr($thread->title, 0, 30) }}...
                            @else
                                {{$thread->title}}
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col">
                                    <h5 class="users overflow-hidden"><strong>User who make the question</strong></h5>
                                    <p class="badge badge-dark bg-dark thread-time">
                                        <?php
                                            $updatedDate = new DateTime($thread->updated_at);
                                            $currentDate = new DateTime(Carbon\Carbon::now());
                                            $interval = $updatedDate->diff($currentDate);

                                            if ($interval->y > 1) {
                                                echo $interval->y . " years ago";
                                            } else if ($interval->y === 1) {
                                                echo $interval->y . " year ago";
                                            } else if ($interval->m > 1) {
                                                echo $interval->m . " months ago";
                                            } else if ($interval->m === 1) {
                                                echo $interval->m . " month ago";
                                            } else if ($interval->d > 1) {
                                                echo $interval->d . " days ago";
                                            } else if ($interval->d === 1) {
                                                echo $interval->d . " day ago";
                                            } else if ($interval->h > 1) {
                                                echo $interval->h . " hours ago";
                                            } else if ($interval->h === 1) {
                                                echo $interval->h . " hour ago";
                                            } else if ($interval->i > 1) {
                                                echo $interval->i . " minutes ago";
                                            } else if ($interval->i === 1) {
                                                echo $interval->i . " minute ago";
                                            } else if ($interval->s > 1) {
                                                echo $interval->s . " seconds ago";
                                            } else {
                                                echo $interval->s . " second ago";
                                            }
                                        ?>
                                    </p>
                                    <p class="badge badge-dark bg-dark thread-time-detail">{{$thread->updated_at}}</p>
                                    <p class="questions">
                                        @if (strlen($thread->content) > 110)
                                            {{ substr($thread->content, 0, 110) }}
                                            <a class="fs-6 text-decoration-none" href="{{ url('/thread/detail') }}">Read More</a>
                                        @else
                                            {{$thread->content}}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="row mt-auto m-0">
                                <div class="col-4 p-0">
                                    <button class="btn btn-primary w-100" title="Like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 1</button>
                                </div>
                                <div class="col-4 p-0">
                                    <button class="btn btn-danger w-100" title="Dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 1</button>
                                </div>
                                <div class="col-4 p-0">
                                    <button class="btn btn-info text-white w-100" title="Comment" ><a href="{{url('thread/') . '/' . $thread->id}}"><i class="fa fa-comment" aria-hidden="true"></i>1</a></button>
                                </div>
                            </div>
                            <div class="tags">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection