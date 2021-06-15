@section('content')
    <div class="row">
        <div class="wrapper">
            <div class="jumbotron text-white text-center" style="width: 90%">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('img/dreamer.png') }}" class="float-end w-100" alt="Welcome">
                    </div>
                    <div class="col-7 my-auto">
                        <h1 class="display-4 text-start">Welcome to Discode!</h1>
                        <p class="lead text-start">where people come and share their opinion.</p>
                    </div>
                </div>
                <div class="row">
                    <hr class="my-4">
                    <p>Click button below to see what people share.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="/thread" role="button">See Thread</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <hr class="bg-white mb-5">
        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/trends.png') }}" class="w-100 rounded" alt="Trends">
            <div class="card bg-transparent text-white p-0 mt-3 border-0">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-fire text-info"></i> Trend Topic</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We provide you a platform to discuss the most popular topic with people around the world. Our trending topic will be shown at the beginning of our thread section. Therefore, you won't miss out the trending topic that being discussed.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/fast.png') }}" class="w-100 rounded" alt="Fast">
            <div class="card bg-transparent text-white p-0 mt-3 border-0">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-spinner text-info"></i> Fast Server Loading</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We value people's time. Therefore, we use the best quality server that ensure fast loading and run 24/7 anytime you need to access the forum. Therefore, you won't face any server down issue that will waste your time.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mb-5">
            <img src="{{ asset('img/secure.png') }}" class="w-100 rounded" alt="Secure">
            <div class="card bg-transparent text-white p-0 mt-3 border-0">
                <div class="card-header rounded-top overflow-hidden border-0">
                    <h3 class="text-center text-white m-0"><i class="fa fa-lock text-info"></i> High Level of Security</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-white">We always prioritize our user convenience and safety. Therefore, we use the best encryption method and keep our website secure and safe from the hacker. We also use Two-Factor Authentication that make your account safer.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="footer text-center text-white mt-5 p-3">
            <div class="row mb-3">
                <div class="col-4">
                    <a href="/thread" class="d-block text-info text-decoration-none"><i class="fa fa-sticky-note"></i> Thread</a>
                </div>
                <div class="col-4">
                    <a href="/tag" class="d-block text-info text-decoration-none"><i class="fa fa-tag"></i> Tag</a>
                </div>
                <div class="col-4">
                    <a href="/user" class="d-block text-info text-decoration-none"><i class="fa fa-user"></i> User</a>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-4 mb-3">
                    <a href="https://www.instagram.com" class="text-primary text-decoration-none"><i class="fa fa-instagram"></i> Follow Us</a>
                </div>
                <div class="col-4">
                    <a href="https://www.youtube.com" class="text-danger text-decoration-none"><i class="fa fa-youtube"></i> Subscribe Us</a>
                </div>
                <div class="col-4">
                    <a href="https://www.whatsapp.com" class="text-success text-decoration-none"><i class="fa fa-whatsapp"></i> Chat Us</a>
                </div>
                <hr>
                <footer id="copyright"></footer>
            </div>
        </div>
    </div>
@endsection