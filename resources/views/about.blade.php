@section('content')
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center text-white"><i class="fa fa-wrench"></i> Built With</h1>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/coding.png') }}" class="w-100 d-block mt-5 rounded" alt="Texting">
            </div>
            <div class="col-md-6 col-12">
                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-percent"></i> Markup Language</h5>
                <span class="badge bg-danger d-block fs-5">HTML</span>
                <span class="badge bg-primary d-block fs-5">CSS</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-code"></i> Programming Language</h5>
                <span class="badge  bg-warning d-block fs-5">JavaScript</span>
                <span class="badge bg-purple d-block fs-5">PHP</span>

                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-cog"></i> Framework</h5>
                <span class="badge bg-danger d-block fs-5">Laravel</span>
                <span class="badge bg-orange d-block fs-5">jQuery</span>
                <span class="badge bg-purple d-block fs-5">Bootstrap</span>
                
                <h5 class="text-center bg-white rounded mt-3 mb-0 p-1"><i class="fa fa-circle"></i> Icon</h5>
                <span class="badge bg-primary d-block fs-5">Font Awesome</span>
            </div>
        </div>

        <hr class="bg-white">

        <div class="row">
            <h1 class="text-center text-white mb-5"><i class="fa fa-info-circle"></i> Project Details</h1>
            <div class="col-md-6 col-12">
                <h3 class="text-info float-end"><i class="fa fa-hourglass-start text-primary"></i> Start on Friday, May 14, 2021</h3>
                <h3 class="text-info float-end"><i class="fa fa-hourglass-end text-primary"></i> Finish on Sunday, June 27, 2021</h3>
                <h3 class="text-info float-end"><i class="fa fa-pencil text-primary"></i> Created using Visual Studio Code</h3>
                <h3 class="text-info float-end"><i class="fa fa-users text-primary"></i> Collaborate using Github</h3>
                <h3 class="text-info float-end"><i class="fa fa-server text-primary"></i> Server by Apache</h3>
                <h3 class="text-info float-end"><i class="fa fa-database text-primary"></i> Database by MySQL</h3>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/projection.png') }}" class="w-100 rounded" alt="Projection">
            </div>
        </div>

        <hr class="bg-white">

        <div class="row">
            <h1 class="text-center text-white mb-5"><i class="fa fa-connectdevelop"></i> Our Developer</h1>
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
@endsection