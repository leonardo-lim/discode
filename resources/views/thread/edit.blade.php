@section('content')
    <h1 class="text-white text-center">Edit Thread</h1>
    <div class="container-fluid w-75" id="editThread">
        <form action="{{url('/thread') . '/' . $thread->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row mt-5">
                <div class="input-group m-auto mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Edit Title" value="{{$thread->title}}">
                    @error('title')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-4">
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Edit Content" rows="5">{{$thread->content}}</textarea>
                    @error('content')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <a href="/thread" class="btn btn-info text-white d-block"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-refresh"></i> Update</button>    
                </div>
            </div>
        </form>
    </div>
@endsection