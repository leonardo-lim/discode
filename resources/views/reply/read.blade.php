@section('read')
    <div class="row mb-4" id="reply">
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
                        <p>No reply yet</p>
                    @else
                        @php($i = $count - 1)
                        @foreach ($thread->reply as $reply)
                            <div class="user ms-1">{{$replies[$i--]->user['name']}}</div>
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
                            <div class="reply bg-info rounded p-2 mb-2">
                                <p class="m-0 text-white">{{$reply->content}}</p>
                            </div>
                            <form action="{{url('/reply') . '/' . $reply->id}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-xl-11 col-md-10 col-sm-10 col-10">
                                        <textarea class="form-control w-100 @error('content') is-invalid @enderror" name="content" placeholder="Reply" rows="1">{{old('content')}}</textarea>
                                        <textarea name="thread_id" style="display:none">{{$thread->id}}</textarea>
                                        @error('content')
                                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-1 col-md-2 col-sm-2 col-2">
                                        <button type="submit" class="btn btn-primary w-100 h-100 p-0" id=""><i class="fa fa-send" title="Send"></i></button>
                                    </div>
                                </div>
                            </form>

                            {{-- EDIT REPLY --}}
                            <a href="/reply/{{$reply->id}}/edit" class="btn btn-warning text-white"><i class="fa fa-edit"></i></a>
                            
                            {{-- DELETE REPLY --}}
                            <form action="{{route('reply.destroy',$reply->id)}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                            <hr>
                            @foreach ($replies as $r)
                                @if ($r->parent_id === $reply->id)
                                    <div class="ms-3">
                                        <div class="user ms-1">{{$r->user['name']}}</div>
                                        <p class="badge badge-dark bg-dark mb-2 thread-time">
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
                                        <div class="reply bg-info rounded p-2 mb-2">
                                            <p class="m-0 text-white">{{$r->content}}</p>
                                        </div>
            
                                        {{-- EDIT REPLY --}}
                                        <a href="/reply/{{$r->id}}/edit" class="btn btn-warning text-white"><i class="fa fa-edit"></i></a>
                                        
                                        {{-- DELETE REPLY --}}
                                        <form action="{{route('reply.destroy',$r->id)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <hr>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection