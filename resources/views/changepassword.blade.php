<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discode</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
</head>
<body>
    <video autoplay loop muted>
        <source src="{{ asset('video/underwater.mp4') }}" type="video/mp4">
    </video>

    <h1 class="text-white text-center pt-5"><i class="fa fa-key"></i> Change Password</h1>

    <div class="container-fluid w-75" id="editUser">
        @foreach ($profiles as $profile)
            @if (Auth::id() === $profile['user_id'])
                <div class="row">
                    <div class="col mx-auto mt-3">
                        <div class="mx-auto w-25 rounded">
                            @if (!$profile['photo_url'])
                                <img src="{{ asset('profile/default.png') }}" class="img-thumbnail w-100" alt="Profile Picture">
                            @else
                                <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="img-thumbnail w-100" alt="Profile Picture">
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Error Message --}}
                <div class="row">
                    @if (session('error'))
                        <div class="alert alert-danger w-100 m-auto my-3 text-center alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="row mt-3">
                    <div class="input-group m-auto mb-3">
                        <input type="text" class="form-control" value="{{$profile->user['name']}}" readonly>
                    </div>
                </div>
            @endif
        @endforeach

        <form action="{{route('user.updatepassword', $profile->user_id)}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="input-group m-auto mb-3">
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Add Current Password">
                    @error('old_password')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Add New Password">
                    @error('password')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm New Password">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a href="/" class="btn btn-info text-white w-100"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-refresh"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>