@extends('layout')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                    <h1 class="mb-3 bread">Browse Jobs</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb bg-light">
        <div class="container">
            <div class="row">
                <div class="ftco-search">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content p-4" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                    aria-labelledby="v-pills-nextgen-tab">
                                    <form action="{{ route('browseJob.store') }}" class="search-job" method="Get">
                                        @csrf
                                        <div class="row no-gutters">
                                            <div class="col-md mr-md-2">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <input type="text" class="form-control" placeholder="Fill title"
                                                            name="title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md mr-md-2">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <input type="text" class="form-control" placeholder="Fill time"
                                                            name="time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md mr-md-2">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-map-marker"></span></div>
                                                        <input type="text" class="form-control" placeholder="Location"
                                                            name="location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <button type="submit"
                                                            class="form-control btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-lg-4">

                    @if (session('applySuccess'))
                        <center>
                            <p style="color:#206dfb ; font-size:26px">{{ session('applySuccess') }}</p>
                        </center>
                    @endif

                    @if (isset($jobs))
                        @foreach ($jobs as $job)
                            <form action="{{ route('browseJob.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 ftco-animate">
                                        <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                            <div class="one-third mb-4 mb-md-0">
                                                <div class="job-post-item-header align-items-center">
                                                    <span class="subadge">{{ $job->time }}</span>
                                                    <h2 class="mr-3 text-black"><a href="#">{{ $job->title }}</a>
                                                    </h2>
                                                </div>
                                                @foreach ($idMainCv as $id)
                                                    <input type="hidden" value="{{ $id }}" name="cv_id">
                                                @endforeach
                                                <input type="hidden" name="employer_id" value="{{ $job->employer_id }}">
                                                <div class="job-post-item-body d-block d-md-flex">
                                                    <div class="mr-3"><span class="icon-layers"></span> <a
                                                            href="#">{{ $job->status }}</a></div>
                                                    <div><span class="icon-my_location"></span>
                                                        <span>{{ $job->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                                <div>
                                                    <a href="#"
                                                        class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                        <span class="icon-heart"></span>
                                                    </a>
                                                </div>
                                                <button type="submit" class="btn btn-primary py-2">Apply Job</button>
                                            </div>
                                        </div>
                                    </div><!-- end -->
                                </div>
                            </form>
                        @endforeach
                        {{ $jobs->withQueryString()->links() }}
                    @else
                        <div class="alert alert-primary" role="alert">
                            <center>NOT DATA, CLICK SEARCH TO FIND JOBS !</center>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
