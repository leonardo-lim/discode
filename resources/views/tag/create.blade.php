@section('content')
    <h1 class="text-white text-center">Add Tag</h1>
    <div class="container-fluid w-75" id="addTag">
        <form action="{{url('/tag')}}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="input-group m-auto mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a href="/tag" class="btn btn-info text-white d-block"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Add</button>    
                </div>
            </div>
        </form>
    </div>
@endsection