@section('content')
    <div class="container">
        <div class="row mb-5">
            <h1 class="text-white text-center"><i class="fa fa-info-circle"></i> About</h1>
        </div>

        <div class="row mb-5">
            <h1 class="text-center text-info"><i class="fa fa-wrench"></i> Built With</h1>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/coding.png') }}" class="w-100 d-block mt-5 rounded" alt="Texting">
            </div>
            <div class="col-md-6 col-12">
                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-percent"></i> Markup Language</h5>
                <span class="badge badge-danger bg-danger d-block fs-5">HTML</span>
                <span class="badge badge-primary bg-primary d-block fs-5">CSS</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-code"></i> Programming Language</h5>
                <span class="badge badge-warning bg-warning d-block fs-5">JavaScript</span>
                <span class="badge badge-warning bg-purple d-block fs-5">PHP</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-cog"></i> Framework</h5>
                <span class="badge badge-warning bg-danger d-block fs-5">Laravel</span>
                <span class="badge badge-warning bg-orange d-block fs-5">jQuery</span>
                <span class="badge badge-primary bg-purple d-block fs-5">Bootstrap</span>
            </div>
        </div>

        <hr class="bg-white">

        <div class="row">
            <h1 class="text-center text-info mb-5"><i class="fa fa-info-circle"></i> Project Details</h1>
            <div class="col-md-6 col-12">
                <h3 class="text-white float-end"><i class="fa fa-hourglass-start"></i> Start on Friday, May 14, 2021</h3>
                <h3 class="text-white float-end"><i class="fa fa-hourglass-end"></i> Finish on Sunday, June 27, 2021</h3>
                <h3 class="text-white float-end"><i class="fa fa-pencil"></i> Created using Visual Studio Code</h3>
                <h3 class="text-white float-end"><i class="fa fa-users"></i> Collaborate using Github</h3>
                <h3 class="text-white float-end"><i class="fa fa-server"></i> Server by Apache</h3>
                <h3 class="text-white float-end"><i class="fa fa-database"></i> Database by MySQL</h3>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/projection.png') }}" class="w-100 rounded" alt="Projection">
            </div>
        </div>

        <hr class="bg-white">

        <div class="row">
            <h1 class="text-center text-info mb-5"><i class="fa fa-connectdevelop"></i> Our Developer</h1>
            <div class="col-md-6 col-12 text-center text-white">
                <img src="{{ asset('profile/leo.jpg') }}" class="rounded-circle img-thumbnail d-block m-auto mb-3" width="300" height="300" alt="Profile Picture">
                <h1>Leonardo L.</h1>
                <p class="text-primary"><i class="fa fa-graduation-cap"></i> Student at Binus University</p>
                <a href="https://www.instagram.com/leonardolim78" class="text-info text-decoration-none d-block"><i class="fa fa-instagram"></i> leonardolim78</a>
                <a href="https://www.github.com/leonardolim78" class="text-info text-decoration-none d-block"><i class="fa fa-github"></i> leonardolim78</a>
                <a href="https://www.linkedin.com/in/leonardo-lim-b1816a137" class="text-info text-decoration-none d-block"><i class="fa fa-linkedin"></i> Leonardo Lim</a>
            </div>
            <div class="col-md-6 col-12 text-center text-white">
                <img src="{{ asset('profile/julian.jpg') }}" class="rounded-circle img-thumbnail d-block m-auto mb-3" width="300" height="300" alt="Profile Picture">
                <h1>Julian A. W.</h1>
                <p class="text-primary"><i class="fa fa-graduation-cap"></i> Student at Binus University</p>
                <a href="https://www.instagram.com/julian_aliwardana" class="text-info text-decoration-none d-block"><i class="fa fa-instagram"></i> julian_aliwardana</a>
                <a href="https://github.com/ryuuichi3007" class="text-info text-decoration-none d-block"><i class="fa fa-github"></i> Ryuuichi3007</a>
                <a href="https://www.linkedin.com/in/julian-alifirman-wardana-45a979206/" class="text-info text-decoration-none d-block"><i class="fa fa-linkedin"></i> Julian Alifirman Wardana</a>
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