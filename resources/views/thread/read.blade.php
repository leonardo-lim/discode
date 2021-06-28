@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col text-center">
                @if ($content === 'thread')
                    <a href="/thread" class="mx-3 thread-tab active"><i class="fa fa-circle"></i> Default</a>
                @else
                    <a href="/thread" class="mx-3 thread-tab"><i class="fa fa-circle"></i> Default</a>
                @endif

                @if ($content === 'oldestthread')
                    <a href="/thread/oldest" class="mx-3 thread-tab active"><i class="fa fa-arrow-down"></i> Oldest</a>
                @else
                    <a href="/thread/oldest" class="mx-3 thread-tab"><i class="fa fa-arrow-down"></i> Oldest</a>
                @endif

                @if ($content === 'latestthread')
                    <a href="/thread/latest" class="mx-3 thread-tab active"><i class="fa fa-arrow-up"></i> Latest</a>
                @else
                    <a href="/thread/latest" class="mx-3 thread-tab"><i class="fa fa-arrow-up"></i> Latest</a>
                @endif
            </div>
        </div>
        
        <div class="row my-5">
            <div class="col text-center">
                @if ($total > 1)
                    <h2 class="text-white w-25 rounded m-auto mb-2"><i class="fa fa-sticky-note"></i> {{$total}} threads</h2>
                @else
                    <h2 class="text-white w-25 rounded m-auto mb-2"><i class="fa fa-sticky-note"></i> {{$total}} thread</h2>
                @endif
                <a href="{{ url('/thread/create') }}" class="btn btn-primary w-25"><i class="fa fa-plus"></i> Add Thread</a>
            </div>
        </div>

        <div class="row" id="listThread">
            @if ($total === 0)
                <div class="col-4 m-auto">
                    <div class="card bg-transparent text-white p-0 mb-5 border-0 justify-content-center" style="height: 300px">
                        <h5 class="text-center text-white">No thread has posted yet</h5>
                    </div>
                </div>
            @endif

            @foreach ($threads as $thread)
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-transparent text-white p-0 mb-5 border-0" style="height: 300px">
                        @if (Auth::user()->name === 'Admin')
                            <a href="/thread/{{$thread->id}}/edit" class="btn btn-warning text-white" style="position: absolute; top: -10px; right: 28px"><i class="fa fa-edit"></i></a>
                            <form action="{{url('/thread') . '/' . $thread->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" style="position: absolute; top: -10px; right: -10px" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        @endif
                        
                        <div class="card-header rounded-top overflow-hidden border-0" style="max-height: 35px">
                            @if (strlen($thread->title) > 30)
                                {{ substr($thread->title, 0, 30) }}...
                            @else
                                {{$thread->title}}
                            @endif

                            @if ($thread->is_locked)
                                <span title="Locked" style="width: 40px"><i class="fa fa-lock"></i></span>
                            @else
                                <span title="Opened" style="width: 40px"><i class="fa fa-unlock"></i></span>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-2">
                                    @foreach ($profiles as $profile)
                                        @if ($thread->user['id'] === $profile['user_id'])
                                            @if (!$profile['photo_url'])
                                                <img src="{{ asset('profile/default.png') }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                            @else
                                                <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-10">
                                    <a href="/user/{{$thread->user['id']}}" class="users overflow-hidden ms-1 text-white text-decoration-none d-block h5"><strong>{{$thread->user['name']}}</strong></a>
                                    <p class="badge badge-dark bg-dark thread-time">
                                        <?php
                                            $updatedDate = new DateTime($thread->created_at);
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
                                    <p class="badge badge-dark bg-dark thread-time-detail">{{$thread->created_at}}</p>
                                    @if ($thread->created_at != $thread->updated_at)
                                        <span class="badge badge-dark bg-dark">Edited</span>
                                    @endif
                                </div>

                                <p class="questions">
                                    @if (strlen($thread->content) > 110)
                                        {{ substr($thread->content, 0, 110) }}
                                        <a class="fs-6 text-decoration-none" href="/thread/{{$thread->id}}">Read More</a>
                                    @else
                                        {{$thread->content}}
                                    @endif
                                </p>
                            </div>

                            @php($likeCount = 0)
                            @foreach ($likes as $like)
                                @if ($like->thread_id === $thread->id && $like->is_liked)
                                    @php($likeCount++)
                                @endif
                            @endforeach

                            @php($dislikeCount = 0)
                            @foreach ($dislikes as $dislike)
                                @if ($dislike->thread_id === $thread->id && $dislike->is_disliked)
                                    @php($dislikeCount++)
                                @endif
                            @endforeach

                            <div class="row mt-auto m-0">
                                <div class="col-4 p-0">
                                    @php($check = false)
                                    @foreach ($likes as $like)
                                        @if ($like->is_liked && $like->user_id === Auth::id() && $like->thread_id === $thread->id)
                                            @php($check = true)
                                            @break
                                        @endif
                                    @endforeach

                                    @if ($check)
                                        <a href="/thread/{{$thread->id}}" class="btn btn-light text-primary w-100" title="Liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$likeCount}}</a>
                                    @else
                                        <a href="/thread/{{$thread->id}}" class="btn btn-primary w-100" title="Like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$likeCount}}</a>
                                    @endif
                                </div>
                                <div class="col-4 p-0">
                                    @php($check = false)
                                    @foreach ($dislikes as $dislike)
                                        @if ($dislike->is_disliked && $dislike->user_id === Auth::id() && $dislike->thread_id === $thread->id)
                                            @php($check = true)
                                            @break
                                        @endif
                                    @endforeach

                                    @if ($check)
                                        <a href="/thread/{{$thread->id}}" class="btn btn-light text-danger w-100" title="Disliked"><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{$dislikeCount}}</a>
                                    @else
                                        <a href="/thread/{{$thread->id}}" class="btn btn-danger w-100" title="Dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{$dislikeCount}}</a>
                                    @endif
                                </div>
                                <div class="col-4 p-0">
                                    @php($count = 0)
                                    @foreach ($thread->reply as $reply)
                                        @if (!$reply->parent_id)
                                            @php($count++)
                                        @endif
                                    @endforeach
                                    <a href="/thread/{{$thread->id}}" class="btn btn-info text-white w-100" title="Reply"><i class="fa fa-reply" aria-hidden="true"></i> {{$count}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection