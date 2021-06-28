@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col text-center">
                @if ($total > 1)
                    <h2 class="text-white w-25 rounded m-auto mb-2"><i class="fa fa-tags"></i> {{$total}} tags</h2>
                @else
                    <h2 class="text-white w-25 rounded m-auto mb-2"><i class="fa fa-tags"></i> {{$total}} tag</h2>
                @endif
                <a href="{{ url('/tag/create') }}" class="btn btn-primary w-25"><i class="fa fa-plus"></i> Add Tag</a>
            </div>
        </div>

        <div class="row" id="listUser">
            @if ($total === 0)
                <div class="col-4 m-auto">
                    <div class="card bg-transparent text-white p-0 mb-5 border-0 justify-content-center" style="height: 100px">
                        <h5 class="text-center text-white">No tag has added yet</h5>
                    </div>
                </div>
            @endif

            @foreach ($tags as $tag)
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-transparent text-white p-0 mb-5 border-0" style="height: 100px">
                        @if (Auth::user()->name === 'Admin')
                            <a href="/tag/{{$tag->id}}/edit" class="btn btn-warning text-white" style="position: absolute; top: -10px; right: 28px"><i class="fa fa-edit"></i></a>
                            <form action="{{url('/tag') . '/' . $tag->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" style="position: absolute; top: -10px; right: -10px" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        @endif

                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div>
                                    <h4 class="mt-2">
                                        <a href="/tag/{{$tag->id}}" class="btn-tag">
                                            @if (strlen($tag->name) > 20)
                                                #{{ substr($tag->name, 0, 20) }}...
                                            @else
                                                #{{$tag->name}}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection