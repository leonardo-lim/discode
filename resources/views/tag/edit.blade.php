@section('content')
    <h1 class="text-white text-center">Edit Tag</h1>
    <div class="container-fluid w-75" id="editTag">
        <form action="{{url('/tag') . '/' . $tag->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row mt-5">
                <div class="input-group m-auto mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Edit Tag" value="{{$tag->name}}">
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
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-refresh"></i> Update</button>    
                </div>
            </div>
        </form>
    </div>
@endsection