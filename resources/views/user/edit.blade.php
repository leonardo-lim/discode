@section('content')
    @foreach ($profiles as $profile)
        @if ($user->id === $profile['user_id'])
            <h1 class="text-white text-center">Edit User</h1>
            <div class="container-fluid w-75" id="editUser">
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row mt-3">
                        <div class="input-group m-auto mb-3">
                            <input type="text" class="form-control @error('Fullname') is-invalid @enderror" name="Fullname" placeholder="Edit Fullname" value="{{$profile->full_name}}">
                            @error('Fullname')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group m-auto mb-3">
                            <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" placeholder="Edit Job" value="{{$profile->job}}">
                            @error('job')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group m-auto mb-3">
                            <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" placeholder="Edit Gender" value="{{$profile->gender}}">
                            @error('gender')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group m-auto mb-3">
                            <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" placeholder="Edit Date Of Birth" value="{{$profile->date_of_birth}}">
                            @error('date_of_birth')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group m-auto mb-3">
                            <input type="text" class="form-control @error('region') is-invalid @enderror" name="region" placeholder="Edit Region" value="{{$profile->region}}">
                            @error('region')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group m-auto mb-4">
                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" placeholder="Edit Bio" rows="5">{{$profile->bio}}</textarea>
                            @error('bio')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <a href="/user/{{$user->id}}" class="btn btn-info text-white d-block"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-refresh"></i> Update</button>    
                        </div>
                    </div>
                </form>
            </div>
        @endif
    @endforeach
@endsection