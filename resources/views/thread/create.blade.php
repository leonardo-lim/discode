@section('content')
    <h1 class="text-white text-center">Add Thread</h1>
    <div class="container-fluid w-75" id="addThread">
        <form action="{{url('/thread')}}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="input-group m-auto mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-4">
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Content" rows="5">{{old('content')}}</textarea>
                    @error('content')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div id="tagDisplay" class="text-white"></div>
            </div>

            <div class="row">
                <div class="input-group m-auto mb-3">
<<<<<<< HEAD
                    {{-- Nitip le UI nya --}}
                    <select class="form-control" multiple="" name="tag[]" id="tagInput">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
=======
                    <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tagInput" name="tag" placeholder="Tag" value="{{old('title')}}">
                    @error('tag')
                        <div class="invalid-feedback bg-danger text-white rounded mt-2 p-2">{{$message}}</div>
                    @enderror
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a href="/thread" class="btn btn-info text-white d-block"><i class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Add</button>    
                </div>
            </div>
        </form>
    </div>
@endsection