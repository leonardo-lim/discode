@section('content')
    <div class="container-fluid" id="detailsUser">
        <h1 class="text-white text-center">User Profile</h1>
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
                                            <p class="mb-2"><i class="fa fa-location-arrow"></i> {{$profile->region}}</p>

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
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-center">
                                                <p><i class="fa fa-info-circle"></i> {{$profile->bio}}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-1 mt-3">
                                    @php($count = 0)
                                    @foreach ($threads as $thread)
                                        @if ($thread->user_id === $user->id)
                                            @php($count++)
                                        @endif
                                    @endforeach

                                    <div class="col-4 p-0 pt-3 text-center bg-primary rounded">
                                        @if ($count > 1)
                                            <h2>{{$count}}</h2>
                                            <p>threads posted</p>
                                        @else
                                            <h2>{{$count}}</h2>
                                            <p>thread posted</p>
                                        @endif
                                    </div>

                                    @php($count = 0)
                                    @foreach ($replies as $reply)
                                        @if ($reply->user_id === $user->id)
                                            @php($count++)
                                        @endif
                                    @endforeach

                                    <div class="col-4 p-0 pt-3 text-center bg-danger rounded">
                                        @if ($count > 1)
                                            <h2>{{$count}}</h2>
                                            <p>threads replied</p>
                                        @else
                                            <h2>{{$count}}</h2>
                                            <p>thread replied</p>
                                        @endif
                                    </div>

                                    @php($count = 0)
                                    @foreach ($threads as $thread)
                                        @if ($thread->user_id === $user->id)
                                            @php($count++)
                                        @endif
                                    @endforeach

                                    <div class="col-4 p-0 pt-3 text-center bg-warning rounded">
                                        @if ($count > 1)
                                            <h2>{{$count}}</h2>
                                            <p>likes gained</p>
                                        @else
                                            <h2>{{$count}}</h2>
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

        <div class="row my-3">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="row">
                    <div class="col">
                        <a href="/user" class="btn btn-info text-white w-100"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection