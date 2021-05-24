@section('content')
    <div class="container-fluid" id="detailsThread">
        <h1 class="text-white text-center">Details of Thread</h1>
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="card bg-transparent text-white p-0 mb-3 mt-3 border-0 rounded-top" style="min-height: 300px">
                    <div class="card-header bg-info rounded-top pb-0 border-0">
                        <h3>{{$thread->title}}</h3>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col">
                                <h5 class="users ms-1"><strong>{{$thread->user['name']}}</strong></h5>
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>{{$thread->content}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                @foreach ($thread->tag as $tag)
                                    <span class="badge badge-warning bg-warning text-primary p-2 mb-5">#{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-auto m-0">
                            <div class="col-6 p-0">
                                <button class="btn btn-primary w-100" title="Like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 1</button>
                            </div>
                            <div class="col-6 p-0">
                                <button class="btn btn-danger w-100" title="Dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 1</button>
                            </div>
                        </div>
                        <div class="tags">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="reply">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="card p-0 mb-3 mt-3 border-0 rounded-top">
                    @php($count = 0)
                    @foreach ($thread->reply as $reply)
                        @php($count++)
                    @endforeach

                    <div class="card-header bg-info">
                        @if ($count > 1)
                            <label class="fs-5 p-2 text-white"><i class="fa fa-comment" aria-hidden="true"></i> {{$count}} replies</label>
                        @else
                            <label class="fs-5 p-2 text-white"><i class="fa fa-comment" aria-hidden="true"></i> {{$count}} reply</label>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($count === 0)
                            <p>No reply yet.</p>
                        @else
                            @php($i = $count - 1)
                            @foreach ($thread->reply as $reply)
                                <div class="user ms-1">{{$replies[$i--]->user['name']}}</div>
                                <p class="badge badge-dark bg-dark mb-2 thread-time">
                                    <?php
                                        $updatedDate = new DateTime($reply->updated_at);
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
                                <p class="badge badge-dark bg-dark thread-time-detail">{{$reply->updated_at}}</p>
                                <div class="reply bg-primary rounded p-2 mb-2">
                                    <p class="m-0 text-white">{{$reply->content}}</p>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <a href="/thread" class="btn btn-primary text-white w-100 my-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection