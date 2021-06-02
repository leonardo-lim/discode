@section('content')
    <h1 class="text-white text-center">Edit Reply</h1>
    <div class="container-fluid w-75" id="editReply">
        <form action="{{route('reply.update',$reply->id)}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="input-group m-auto mb-4">
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Edit Reply" rows="5">{{$reply->content}}</textarea>
                    @error('content')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <a href="/thread/{{$reply->thread_id}}" class="btn btn-info text-white d-block"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-refresh"></i> Update</button>    
                </div>
            </div>
        </form>
    </div>
@endsection