@section('content')
    <div class="container-fluid" id="detailsThread">
        <h1 class="text-white text-center">Details of Thread</h1>
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="card bg-transparent text-white p-0 mb-3 mt-3 border-0 rounded-top" style="min-height: 300px">
                    <div class="card-header bg-info rounded-top pb-0 border-0">
                        <h3 class="d-inline">{{$thread->title}}</h3>
                        
                        @if (Auth::user()->name === 'Admin')
                            <form action="{{ route('thread.lock', $thread->id) }}" method="POST" class="d-inline">
                                @method('patch')
                                @csrf
                                @if ($thread->is_locked)
                                    <button type="submit" class="btn btn-warning float-end mb-2" title="Open Thread" style="width: 40px"><i class="fa fa-lock"></i></button>
                                @else
                                    <button type="submit" class="btn btn-warning float-end mb-2" title="Lock Thread" style="width: 40px"><i class="fa fa-unlock"></i></button>
                                @endif
                            </form>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-1 col-2">
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
                            
                            <div class="col-lg-11 col-10">
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
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>{{$thread->content}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                @foreach ($thread->tag as $tag)
                                    <a href="/tag/{{$tag->id}}" class="badge badge-warning bg-warning text-primary text-decoration-none p-2 mb-5">#{{$tag->name}}</a>
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

        <div class="row my-3">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="row">
                    <div class="col-6">
                        <a href="/thread" class="btn btn-info text-white w-100"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary text-white w-100" type="button" id=replyButton><i class="fa fa-arrow-down"></i> Go to Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection