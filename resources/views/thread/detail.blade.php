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