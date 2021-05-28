@section('read')
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
                        <p>No reply yet</p>
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
                            <div class="reply bg-info rounded p-2 mb-2">
                                <p class="m-0 text-white">{{$reply->content}}</p>
                            </div>
                            <form action="{{url('/thread') . '/' . $thread->id}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-xl-11 col-md-10 col-sm-10 col-10">
                                        <textarea class="form-control w-100 @error('content') is-invalid @enderror" name="content" placeholder="Reply" rows="1">{{old('content')}}</textarea>
                                        @error('content')
                                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-1 col-md-2 col-sm-2 col-2">
                                        <button type="submit" class="btn btn-primary w-100 h-100" id=""><i class="fa fa-send" title="Send"></i></button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection