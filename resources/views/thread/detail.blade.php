@section('content')
    <div class="container">
        <h1 class="text-white text-center">Details of Thread</h1>
        <div class="row" id="thread">
            @foreach ($dataReply as $thread)
                <div class="cardDetail p-0 mb-3 mt-3 border-0">
                    <div class="bg-primary rounded-top card-header overflow-hidden">
                            @if (strlen($thread->title) > 30)
                                <h3 style="color: white">[{{ substr($thread->title, 0, 30) }}...]</h3>
                            @else
                                <h3 style="color: white">[{{$thread->title}}]</h3>
                                <p style="color: white">{{$thread->content}}</p>
                            @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col">
                                {{-- Kurang User pembuat threadnya--}}
                                {{-- @foreach ($thread->user as $user)
                                    <p>{{$user->email}}</p>
                                @endforeach --}}
                                <h5 class="users overflow-hidden"><strong>Juan&Neri</strong></h5>
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
            @endforeach
        </div>
        <div class="row bg-white mt-5 p-2" id="reply">
            <h3 class="p-0"><i class="fa fa-comment" aria-hidden="true"> 2</i></h3>
            @foreach ($dataReply as $thread)
                @foreach ($thread->reply as $reply)
                    <div class="reply bg-primary py-2 mb-2">
                        <p class="m-0" style="color: white">{{$reply->content}}</p>
                    </div>
                    <p class=""><i>Answered At {{$reply->created_at}}</i></p>
                    <hr>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection