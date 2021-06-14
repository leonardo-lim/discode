@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col text-center">
                @if ($total > 1)
<<<<<<< HEAD
                    <h2 class="text-white w-25 rounded m-auto mb-2">{{$total}} users</h2>
                @else
                    <h2 class="text-white w-25 rounded m-auto mb-2">{{$total}} user</h2>
                @endif
=======
                    <h2 class="text-white w-25 rounded m-auto mb-2">{{$total}} threads</h2>
                @else
                    <h2 class="text-white w-25 rounded m-auto mb-2">{{$total}} thread</h2>
                @endif
                <a href="{{ url('/user/create') }}" class="btn btn-primary w-25"><i class="fa fa-plus"></i> Add User</a>
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
            </div>
        </div>

        <div class="row" id="listUser">
            @foreach ($users as $user)
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-transparent text-white p-0 mb-5 border-0" style="height: 300px">
<<<<<<< HEAD
=======
                        <a href="/user/{{$user->id}}/edit" class="btn btn-warning text-white" style="position: absolute; top: -10px; right: 28px"><i class="fa fa-edit"></i></a>
                        <form action="{{url('/user') . '/' . $user->id}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" style="position: absolute; top: -10px; right: -10px" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form>

>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="member-thumb mx-auto">
                                    @foreach ($profiles as $profile)
                                        @if ($user->id === $profile['user_id'])
                                            @if (!$profile['photo_url'])
                                                <img src="{{ asset('profile/default.png') }}" class="rounded-circle img-thumbnail" width="100" height="100" alt="Profile Picture">
                                            @else
                                                <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle img-thumbnail" width="100" height="100" alt="Profile Picture">
                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                                <div>
                                    <h4 class="mt-2">
                                        @if (strlen($user->name) > 20)
                                            {{ substr($user->name, 0, 20) }}...
                                        @else
                                            {{$user->name}}
                                        @endif
                                    </h4>
                                    <p class="text-info">{{$user->email}}</p>
                                </div>

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

                                <div class="row">
                                    <a href="/user/{{$user->id}}" class="btn btn-primary mt-1 btn-rounded">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection