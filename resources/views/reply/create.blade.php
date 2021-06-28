@section('create')
    @if (!$thread->is_locked)
        <div class="row" id="addReply">
            <div class="col-xl-8 col-md-8 col-sm-10 m-auto mb-3">
                <form action="{{url('/thread') . '/' . $thread->id}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-xl-11 col-md-10 col-sm-10 col-10 p-1">
                            <textarea class="form-control w-100 @error('content') is-invalid @enderror" id="replyInput" name="content" placeholder="Reply">{{old('content')}}</textarea>
                            @error('content')
                                <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-xl-1 col-md-2 col-sm-2 col-2 p-1">
                            <button type="submit" class="btn btn-primary w-100 h-100" id=""><i class="fa fa-paper-plane" title="Send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection