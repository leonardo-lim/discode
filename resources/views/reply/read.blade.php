@section('read')
    <div class="row mb-4" id="reply">
        <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
            <div class="card p-0 mb-3 mt-3 border-0 rounded-top">
                @php($count = 0)
                @foreach ($thread->reply as $reply)
                    @if (!$reply->parent_id)
                        @php($count++)
                    @endif
                @endforeach
        
                <div class="card-header bg-info">
                    @if ($count > 1)
                        <label class="fs-5 p-2 text-white"><i class="fa fa-comment" aria-hidden="true"></i> {{$count}} replies</label>
                    @else
                        <label class="fs-5 p-2 text-white"><i class="fa fa-comment" aria-hidden="true"></i> {{$count}} reply</label>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        @if ($count === 0)
                            <p>No reply yet</p>
                        @else
                            @foreach ($thread->reply as $reply)
                                @if (!$reply->parent_id) 
                                    <div class="col-lg-1 col-2">
                                        @foreach ($profiles as $profile)
                                            @if ($reply->user['id'] === $profile['user_id'])
                                                @if (!$profile['photo_url'])
                                                    <img src="{{ asset('profile/default.png') }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                                @else
                                                    <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                    <div class="col-lg-8 col-7">
                                        <a href="/user/{{$reply->user['id']}}" class="users overflow-hidden ms-1 text-white text-decoration-none d-block h6"><strong>{{$reply->user['name']}}</strong></a>
                                        <p class="badge badge-dark bg-dark mb-2 thread-time">
                                            <?php
                                                $updatedDate = new DateTime($reply->created_at);
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
                                        <p class="badge badge-dark bg-dark thread-time-detail">{{$reply->created_at}}</p>
                                        @if ($reply->created_at != $reply->updated_at)
                                            <span class="badge badge-dark bg-dark">Edited</span>
                                        @endif
                                    </div>

                                    <div class="col-3">
                                        {{-- DELETE REPLY --}}
                                        <form action="{{route('reply.destroy', $reply->id)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        </form>

                                        {{-- EDIT REPLY --}}
                                        <a href="/reply/{{$reply->id}}/edit" class="btn btn-warning text-white float-end"><i class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="reply bg-info rounded p-2 mb-2">
                                            <p class="m-0 text-white">{{$reply->content}}</p>
                                        </div>
                                    </div>
                                    
                                    <form action="{{url('/reply') . '/' . $reply->id}}" method="POST">
                                        @csrf
                                        <div class="row mb-3 px-2">
                                            <div class="col-xl-11 col-md-10 col-sm-10 col-10 p-1">
                                                <textarea class="form-control w-100 @error('content') is-invalid @enderror" name="content" placeholder="Reply" rows="1">{{old('content')}}</textarea>
                                                <textarea name="thread_id" style="display: none">{{$thread->id}}</textarea>
                                                @error('content')
                                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-1 col-md-2 col-sm-2 col-2 p-1">
                                                <button type="submit" class="btn btn-primary w-100 h-100 p-0" id=""><i class="fa fa-send" title="Send"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    @php($replyCount = 0)
                                    @foreach ($replies as $r)
                                    @if ($r->parent_id === $reply->id)
                                            @php($replyCount++)
                                        @endif
                                    @endforeach
                                    
                                    @if ($replyCount === 1)
                                        <a class="viewReply text-decoration-none ms-1 mb-3" style="display: block; cursor: pointer">View {{$replyCount}} reply</a>
                                    @elseif ($replyCount > 1)
                                        <a class="viewReply text-decoration-none ms-1 mb-3" style="display: block; cursor: pointer">View {{$replyCount}} replies</a>    
                                    @endif

                                    @if ($replyCount === 1)
                                        <a class="hideReply text-decoration-none ms-1 mb-3" style="display: none; cursor: pointer">Hide {{$replyCount}} reply</a>
                                    @elseif ($replyCount > 1)
                                        <a class="hideReply text-decoration-none ms-1 mb-3" style="display: none; cursor: pointer">Hide {{$replyCount}} replies</a>    
                                    @endif

                                    <hr>
                                    <div class="replyInReply" style="display: none">
                                        <div class="row">
                                            @foreach ($replies as $r)
                                                @if ($r->parent_id === $reply->id)
                                                    <div class="col-lg-1 col-2 ps-4">
                                                        @foreach ($profiles as $profile)
                                                            @if ($r->user['id'] === $profile['user_id'])
                                                                @if (!$profile['photo_url'])
                                                                    <img src="{{ asset('profile/default.png') }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                                                @else
                                                                    <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle" width="50" height="50" alt="Profile Picture">
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <div class="col-lg-8 col-7">
                                                        <a href="/user/{{$r->user['id']}}" class="users overflow-hidden ms-2 text-white text-decoration-none d-block h6"><strong>{{$r->user['name']}}</strong></a>
                                                        <p class="badge badge-dark bg-dark ms-1 mb-2 thread-time">
                                                            <?php
                                                                $updatedDate = new DateTime($r->created_at);
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
                                                        <p class="badge badge-dark bg-dark thread-time-detail">{{$r->created_at}}</p>
                                                        @if ($r->created_at != $r->updated_at)
                                                            <span class="badge badge-dark bg-dark">Edited</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-3">
                                                        {{-- DELETE REPLY --}}
                                                        <form action="{{route('reply.destroy',$r->id)}}" method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                        </form>

                                                        {{-- EDIT REPLY --}}
                                                        <a href="/reply/{{$r->id}}/edit" class="btn btn-warning text-white float-end"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                    
                                                    <div class="col ps-4">
                                                        <div class="reply bg-info rounded p-2 mb-2">
                                                            <p class="m-0 text-white">{{$r->content}}</p>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection