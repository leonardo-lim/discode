@section('content')
    <div class="container-fluid" id="detailsUser">
        <h1 class="text-white text-center">Details of User</h1>
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto">
                <div class="card bg-transparent text-white p-0 mb-3 mt-3 border-0 rounded-top" style="min-height: 300px">
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-1 col-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                    @foreach ($profiles as $profile)
                                        @if ($user->id === $profile['user_id'])
                                            @if (!$profile['photo_url'])
                                                <img src="{{ asset('profile/default.png') }}" class="rounded-circle img-thumbnail" width="200" height="200" alt="Profile Picture">
                                            @else
                                                <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle img-thumbnail" width="200" height="200" alt="Profile Picture">
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="col-lg-11 col-10">
                                <h5 class="users ms-1"><strong>{{$user->name}}</strong></h5>
                                <p class="badge badge-dark bg-dark thread-time">
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
                                <p class="badge badge-dark bg-dark thread-time-detail">{{$user->created_at}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>{{$user->bio}}</p>
                            </div>
                        </div>
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