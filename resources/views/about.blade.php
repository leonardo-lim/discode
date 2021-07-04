@section('content')
    <div class="container">
        <div class="row my-5 built-with">
            <h1 class="text-center text-white built-with-title"><i class="fa fa-wrench"></i> Built With</h1>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/coding.png') }}" class="w-100 d-block mt-5 rounded built-with-photo" alt="Texting">
            </div>
            <div class="col-md-6 col-12">
                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1 built-with-desc"><i class="fa fa-percent"></i> Markup Language</h5>
                <span class="badge bg-danger d-block fs-5 built-with-desc">HTML</span>
                <span class="badge bg-primary d-block fs-5 built-with-desc">CSS</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1 built-with-desc"><i class="fa fa-code"></i> Programming Language</h5>
                <span class="badge  bg-warning d-block fs-5 built-with-desc">JavaScript</span>
                <span class="badge bg-purple d-block fs-5 built-with-desc">PHP</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1 built-with-desc"><i class="fa fa-cog"></i> Framework</h5>
                <span class="badge bg-danger d-block fs-5 built-with-desc">Laravel</span>
                <span class="badge bg-orange d-block fs-5 built-with-desc">jQuery</span>
                <span class="badge bg-purple d-block fs-5 built-with-desc">Bootstrap</span>
                
                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1 built-with-desc"><i class="fa fa-circle"></i> Icon</h5>
                <span class="badge bg-primary d-block fs-5 built-with-desc">Font Awesome</span>
            </div>
        </div>

        <hr class="bg-white">

        <div class="row project-details">
            <h1 class="text-center text-white mb-5 project-details-title"><i class="fa fa-info-circle"></i> Project Details</h1>
            <div class="col-md-6 col-12">
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-hourglass-start text-primary"></i> Start on Friday, May 14, 2021</h3>
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-hourglass-end text-primary"></i> Finish on Sunday, June 27, 2021</h3>
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-pen text-primary"></i> Created using Visual Studio Code</h3>
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-users text-primary"></i> Collaborate using Github</h3>
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-server text-primary"></i> Server by Apache</h3>
                <h3 class="text-info float-end project-details-desc"><i class="fa fa-database text-primary"></i> Database by MySQL</h3>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/projection.png') }}" class="w-100 rounded project-details-photo" alt="Projection">
            </div>
        </div>

        <hr class="bg-white">

        <div class="row our-dev">
            <h1 class="text-center text-white mb-5 our-dev-title"><i class="fa fa-users"></i> Our Developer</h1>
            <div class="col-md-6 col-12 text-center text-white">
                <img src="{{ asset('profile/leo.jpg') }}" class="rounded-circle img-thumbnail d-block m-auto mb-3 our-dev-photo-left" width="300" height="300" alt="Profile Picture">
                <h1 class="our-dev-desc-left">Leonardo L.</h1>
                <p class="text-primary our-dev-desc-left"><i class="fa fa-graduation-cap"></i> Student at Binus University</p>
                <a href="https://www.instagram.com/leonardolim78" class="text-info text-decoration-none d-block our-dev-desc-left"><i class="fab fa-instagram"></i> leonardolim78</a>
                <a href="https://www.github.com/leonardolim78" class="text-info text-decoration-none d-block our-dev-desc-left"><i class="fab fa-github"></i> leonardolim78</a>
                <a href="https://www.linkedin.com/in/leonardo-lim-b1816a137" class="text-info text-decoration-none d-block our-dev-desc-left"><i class="fab fa-linkedin"></i> Leonardo Lim</a>
            </div>
            <div class="col-md-6 col-12 text-center text-white">
                <img src="{{ asset('profile/julian.jpg') }}" class="rounded-circle img-thumbnail d-block m-auto mb-3 our-dev-photo-right" width="300" height="300" alt="Profile Picture">
                <h1 class="our-dev-desc-right">Julian A. W.</h1>
                <p class="text-primary our-dev-desc-right"><i class="fab fa-graduation-cap"></i> Student at Binus University</p>
                <a href="https://www.instagram.com/julian_aliwardana" class="text-info text-decoration-none d-block our-dev-desc-right"><i class="fab fa-instagram"></i> julian_aliwardana</a>
                <a href="https://github.com/ryuuichi3007" class="text-info text-decoration-none d-block our-dev-desc-right"><i class="fab fa-github "></i> Ryuuichi3007</a>
                <a href="https://www.linkedin.com/in/julian-alifirman-wardana-45a979206/" class="text-info text-decoration-none d-block our-dev-desc-right"><i class="fab fa-linkedin"></i> Julian Alifirman Wardana</a>
            </div>
        </div>
    </div>
@endsection