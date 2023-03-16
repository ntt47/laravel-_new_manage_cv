@extends('layout_employer')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Job Post</span></p>
                    <h1 class="mb-3 bread">Post A Job</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 mb-5">
                    <form action="{{route('employer.create')}}" class="p-5 bg-white" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-price-1">

                                </label>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-price-2">

                                </label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Job Title</label>
                                <input type="text" id="fullname" class="form-control" placeholder="Fill job title here"
                                    name="title">
                                @error('title')
                                    <p style="color:red">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Duration</label>
                                <input type="text" id="fullname" class="form-control" placeholder="Time duration"
                                    name="status">
                                @error('status')
                                    <p style="color:red">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <h3>Job Type</h3>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-job-type-1">
                                    <input type="radio" id="option-job-type-1" name="time" value="full time"> Full Time
                                </label>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-job-type-2">
                                    <input type="radio" id="option-job-type-2" name="time" value="part time"> Part Time
                                </label>
                            </div>

                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-job-type-3">
                                    <input type="radio" id="option-job-type-3 "name="time" value="freelance"> Freelance
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-job-type-4">
                                    <input type="radio" id="option-job-type-4" name="time" value="internship">
                                    Internship
                                </label>
                            </div>

                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="option-job-type-4">
                                    <input type="radio" id="option-job-type-4" name="time" value="termporary">
                                    Termporary
                                </label>
                                @error('time')
                                    <p style="color:red">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12">
                                <h3>Location</h3>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input type="text" class="form-control" placeholder="Fill location here" name="location">
                            </div>
                            @error('location')
                                <p style="color:red">* {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <h3>Job Description</h3>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <input name="description" class="form-control" id="" cols="30"
                                    rows="5" />
                                @error('description')
                                    <p style="color:red">* {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#"><span class="__cf_email__"
                                    data-cfemail="671e081215020a060e0b2703080a060e094904080a">[email&#160;protected]</span></a>
                        </p>

                    </div>

                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto
                            hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                        <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts. Separated they live in</p>
                        <div class="row d-flex justify-content-center mt-4 mb-4">
                            <div class="col-md-12">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
