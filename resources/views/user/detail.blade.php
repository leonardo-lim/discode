@section('content')
    <div class="container-fluid" id="detailsUser">
        @if (Auth::id() === $user->id)
            <h1 class="text-white text-center"><i class="fa fa-user"></i> My Profile</h1>
        @else
            <h1 class="text-white text-center"><i class="fa fa-user"></i> User Profile</h1>
        @endif

        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="card bg-transparent text-white p-0 mb-3 mt-3 border-0 rounded-top" style="min-height: 300px">
                    <div class="card-body d-flex flex-column">
                        @foreach ($profiles as $profile)
                            @if ($user->id === $profile['user_id'])
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mx-auto w-100 rounded">
                                            @if (!$profile['photo_url'])
                                                <img src="{{ asset('profile/default.png') }}" class="img-thumbnail w-100" alt="Profile Picture">
                                            @else
                                                <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="img-thumbnail w-100" alt="Profile Picture">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-12">
                                        <div class="mt-3 text-center">
                                            @if ($profile->gender === "male")
                                                <h3><strong>{{$profile->full_name}} </strong><i class="fa fa-mars"></i></h3>
                                            @elseif ($profile->gender === "female")
                                                <h3><strong>{{$profile->full_name}} </strong><i class="fa fa-venus"></i></h3>
                                            @else
                                                <h3><strong>{{$profile->full_name}} </strong><i class="fa fa-genderless"></i></h3>
                                            @endif
                                            <h5 class="text-dark bg-primary d-inline rounded p-1">{{$user->email}}</h5>
                                            <h5 class="text-info mt-2">{{$profile->job}}</h5>
                                            <hr>
                                            <p class="mb-2"><i class="fa fa-birthday-cake"></i> {{$profile->date_of_birth}}</p>
                                            <p class="mb-2"><i class="fa fa-map-pin"></i> {{$profile->region}}</p>
                                            <p class="badge badge-dark bg-dark mb-2 thread-time">
                                                <?php
                                                    $updatedDate = new DateTime($user->created_at);
                                                    $currentDate = new DateTime(Carbon\Carbon::now());
                                                    $interval = $updatedDate->diff($currentDate);

                                                    if ($interval->y > 1) {
                                                        echo "Joined " . $interval->y . " years ago";
                                                    } else if ($interval->y === 1) {
                                                        echo "Joined " . $interval->y . " year ago";
                                                    } else if ($interval->m > 1) {
                                                        echo "Joined " . $interval->m . " months ago";
                                                    } else if ($interval->m === 1) {
                                                        echo "Joined " . $interval->m . " month ago";
                                                    } else if ($interval->d > 1) {
                                                        echo "Joined " . $interval->d . " days ago";
                                                    } else if ($interval->d === 1) {
                                                        echo "Joined " . $interval->d . " day ago";
                                                    } else if ($interval->h > 1) {
                                                        echo "Joined " . $interval->h . " hours ago";
                                                    } else if ($interval->h === 1) {
                                                        echo "Joined " . $interval->h . " hour ago";
                                                    } else if ($interval->i > 1) {
                                                        echo "Joined " . $interval->i . " minutes ago";
                                                    } else if ($interval->i === 1) {
                                                        echo "Joined " . $interval->i . " minute ago";
                                                    } else if ($interval->s > 1) {
                                                        echo "Joined " . $interval->s . " seconds ago";
                                                    } else {
                                                        echo "Joined " . $interval->s . " second ago";
                                                    }
                                                ?>
                                            </p>
                                            <p class="badge badge-dark bg-dark mb-2 thread-time-detail">{{$user->created_at}}</p>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-center">
                                                        <p><i class="fa fa-info-circle"></i> {{$profile->bio}}</p>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php($threadCount = 0)
                                @foreach ($threads as $thread)
                                    @if ($thread->user_id === $user->id)
                                        @php($threadCount++)
                                    @endif
                                @endforeach

                                @php($replyCount = 0)
                                @foreach ($replies as $reply)
                                    @if ($reply->user_id === $user->id)
                                        @php($replyCount++)
                                    @endif
                                @endforeach

                                @php($likeCount = 0)
                                @foreach ($threads as $thread)
                                    @if ($thread->user_id === $user->id)
                                        @foreach ($likes as $like)
                                            @if ($like->thread_id === $thread->id && $like->is_liked)
                                                @php($likeCount++)
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                <div class="row mx-1 mt-3">
                                    <div class="col-6 p-0 pt-3 text-center bg-info rounded">
                                        @if ($likeCount >= 1000)
                                            <p><i class="fa fa-dragon fa-lg"></i> Expert Dragon</p>
                                        @elseif ($likeCount >= 500)
                                            <p><i class="fa fa-otter fa-lg"></i> Advanced Otter</p>
                                        @elseif ($likeCount >= 100)
                                            <p><i class="fa fa-frog fa-lg"></i> Intermediate Frog</p>
                                        @elseif ($likeCount >= 50)
                                            <p><i class="fa fa-hippo fa-lg"></i> Beginner Hippo</p>
                                        @else
                                            <p><i class="fa fa-fish fa-lg"></i> Newbie Fish</p>
                                        @endif
                                    </div>
                                    <div class="col-6 p-0 pt-3 text-center bg-purple rounded">
                                        @if ($likeCount >= 1000)
                                            <p><i class="fa fa-fire"></i> You've reached the max role!</p>
                                        @elseif ($likeCount >= 500)
                                            @if (1000 - $likeCount > 1)
                                                <p><i class="fa fa-arrow-up"></i> {{1000 - $likeCount}} likes more to level up</p>
                                            @else
                                                <p><i class="fa fa-arrow-up"></i> {{1000 - $likeCount}} like more to level up</p>
                                            @endif
                                        @elseif ($likeCount >= 100)
                                            @if (500 - $likeCount > 1)
                                                <p><i class="fa fa-arrow-up"></i> {{500 - $likeCount}} likes more to level up</p>
                                            @else
                                                <p><i class="fa fa-arrow-up"></i> {{500 - $likeCount}} like more to level up</p>
                                            @endif
                                        @elseif ($likeCount >= 50)
                                            @if (100 - $likeCount > 1)
                                                <p><i class="fa fa-arrow-up"></i> {{100 - $likeCount}} likes more to level up</p>
                                            @else
                                                <p><i class="fa fa-arrow-up"></i> {{100 - $likeCount}} like more to level up</p>
                                            @endif
                                        @else
                                            @if (50 - $likeCount > 1)
                                                <p><i class="fa fa-arrow-up"></i> {{50 - $likeCount}} likes more to level up</p>
                                            @else
                                                <p><i class="fa fa-arrow-up"></i> {{50 - $likeCount}} like more to level up</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="row mx-1 mt-3">
                                    <div class="col-4 p-0 pt-3 text-center bg-primary rounded">
                                        @if ($threadCount > 1)
                                            <h2>{{$threadCount}}</h2>
                                            <p>threads posted</p>
                                        @else
                                            <h2>{{$threadCount}}</h2>
                                            <p>thread posted</p>
                                        @endif
                                    </div>

                                    <div class="col-4 p-0 pt-3 text-center bg-danger rounded">
                                        @if ($replyCount > 1)
                                            <h2>{{$replyCount}}</h2>
                                            <p>threads replied</p>
                                        @else
                                            <h2>{{$replyCount}}</h2>
                                            <p>thread replied</p>
                                        @endif
                                    </div>

                                    <div class="col-4 p-0 pt-3 text-center bg-warning rounded">
                                        @if ($likeCount > 1)
                                            <h2>{{$likeCount}}</h2>
                                            <p>likes gained</p>
                                        @else
                                            <h2>{{$likeCount}}</h2>
                                            <p>like gained</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->name === 'Admin' || Auth::id() === $user->id)
            <div class="row my-3">
                <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                    <div class="row">
                        <div class="col">
                            <a href="/user/{{$user->id}}/edit" class="btn btn-warning bg-transparent text-white w-100" style="top: -10px; right: 28px"><i class="fa fa-edit"></i> Edit Account</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                    <div class="row">
                        <div class="col">
                            <form action="{{url('/user') . '/' . $user->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger bg-transparent w-100" style="top: -10px; right: -10px" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row my-3">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="row">
                    <div class="col">
                        <a href="/user" class="btn btn-info bg-transparent text-white w-100"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection