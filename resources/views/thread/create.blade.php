@section('content')
    <h1 class="text-white text-center">Add Thread</h1>
    <div class="container-fluid w-50">
        <form action="{{url('/thread')}}" method="POST">
            @csrf
            <div class="row mt-5" id="addThread">
                <div class="input-group m-auto mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-4">
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Content" rows="5">{{old('content')}}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <a href="/thread" class="btn btn-dark d-block">Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100">Add</button>    
                </div>
            </div>
        </form>
    </div>
@endsection