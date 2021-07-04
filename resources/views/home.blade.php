@section('content')
    <div class="row">
        <div class="wrapper">
            <div class="jumbotron text-white text-center" style="width: 90%">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('img/dreamer.png') }}" class="float-end w-100 photo" alt="Welcome">
                    </div>
                    <div class="col-7 my-auto">
                        <h1 class="display-4 text-start tagline">Welcome to Discode!</h1>
                        <p class="lead text-start tagline">where people come and share their opinion.</p>
                    </div>
                </div>
                <div class="row">
                    <hr class="my-4 hr">
                    <p class="desc">Click button below to see what people share.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg btn-see w-50" href="/thread" role="button"><i class="fa fa-eye"></i> See Thread</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row why-us">
        <hr class="bg-white mb-5">
        <h1 class="text-center text-white mb-5 why-us-title"><i class="fa fa-question"></i> Why Us</h1>

        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/trends.png') }}" class="w-100 rounded why-us-photo" alt="Trends">
            <div class="card bg-transparent text-white p-0 mt-3 border-0 why-us-desc">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-fire text-info"></i> Trend Topic</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We provide you a platform to discuss the most popular topic with people around the world. Our trending topic will be shown at the beginning of our thread section. Therefore, you won't miss out the trending topic that being discussed.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/fast.png') }}" class="w-100 rounded why-us-photo" alt="Fast">
            <div class="card bg-transparent text-white p-0 mt-3 border-0 why-us-desc">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-spinner text-info"></i> Fast Server Loading</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We value people's time. Therefore, we use the best quality server that ensure fast loading and run 24/7 anytime you need to access the forum. Therefore, you won't face any server down issue that will waste your time.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/secure.png') }}" class="w-100 rounded why-us-photo" alt="Secure">
            <div class="card bg-transparent text-white p-0 mt-3 border-0 why-us-desc">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-lock text-info"></i> High Level of Security</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We always prioritize our user convenience and safety. Therefore, we use the best encryption method and keep our website secure and safe from the hacker. We also use Two-Factor Authentication that make your account safer.</p>
                </div>
            </div>
        </div>
    </div>
@endsection