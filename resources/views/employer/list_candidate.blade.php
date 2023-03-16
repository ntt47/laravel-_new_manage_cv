@extends('layout_employer')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Canditates</span></p>
                    <h1 class="mb-3 bread">Hire Your Best Candidates</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pr-lg-4">
                    <div class="row">
                        @foreach ($cvs as $cv)
                            <form style="width:100%"
                                action="{{ route('showCv.list_candidate', ['fileName' => $cv->upload]) }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="team d-md-flex p-4 bg-white">
                                        <div class="img"
                                            style="background-image: url({{ asset('images/person_1.jpg') }});">
                                        </div>
                                        <input type="hidden" name="fileName" value="{{ $cv->upload }}">
                                        <div class="text pl-md-4">
                                            <h2>{{ $cv->title }}</h2>
                                            <p class="mb-2">{{ $cv->upload }}</p>
                                            <span class="seen">Time Apply: {{ $cv->created_at }}</span>
                                            @if (isset($totalMoney))
                                                <p><button
                                                        onClick="alert('Tài khoản còn lại của  bạn là: {{ $totalMoney }} nghìn VNĐ')"
                                                        type="submit" class="btn btn-primary">Read Cv</button> </p>
                                            @else 
                                                    <br>
                                                <button type="button" class="btn btn-primary"><a href="{{ route('employer.recharge') }}" style="color: white">You have not money Click <span>There !</span> </a></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                        {{ $cvs->links() }}
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Browse Category</h3>
                        <form action="#" class="search-form mb-3">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        <form action="#" class="browse-form">
                            <label for="option-job-1"><input type="checkbox" id="option-job-1" name="vehicle" value=""
                                    checked> Website &amp; Software</label><br>
                            <label for="option-job-2"><input type="checkbox" id="option-job-2" name="vehicle"
                                    value=""> Education &amp; Training</label><br>
                            <label for="option-job-3"><input type="checkbox" id="option-job-3" name="vehicle"
                                    value=""> Graphics Design</label><br>
                            <label for="option-job-4"><input type="checkbox" id="option-job-4" name="vehicle"
                                    value=""> Accounting &amp; Finance</label><br>
                            <label for="option-job-5"><input type="checkbox" id="option-job-5" name="vehicle"
                                    value=""> Restaurant &amp; Food</label><br>
                            <label for="option-job-6"><input type="checkbox" id="option-job-6" name="vehicle"
                                    value=""> Health &amp; Hospital</label><br>
                        </form>
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Select Location</h3>
                        <form action="#" class="search-form mb-3">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        <form action="#" class="browse-form">
                            <label for="option-location-1"><input type="checkbox" id="option-location-1" name="vehicle"
                                    value="" checked> Sydney, Australia</label><br>
                            <label for="option-location-2"><input type="checkbox" id="option-location-2" name="vehicle"
                                    value=""> New York, United States</label><br>
                            <label for="option-location-3"><input type="checkbox" id="option-location-3" name="vehicle"
                                    value=""> Tokyo, Japan</label><br>
                            <label for="option-location-4"><input type="checkbox" id="option-location-4" name="vehicle"
                                    value=""> Manila, Philippines</label><br>
                            <label for="option-location-5"><input type="checkbox" id="option-location-5" name="vehicle"
                                    value=""> Seoul, South Korea</label><br>
                            <label for="option-location-6"><input type="checkbox" id="option-location-6" name="vehicle"
                                    value=""> Western City, UK</label><br>
                        </form>
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Job Type</h3>
                        <form action="#" class="browse-form">
                            <label for="option-job-type-1"><input type="checkbox" id="option-job-type-1" name="vehicle"
                                    value="" checked> Partime</label><br>
                            <label for="option-job-type-2"><input type="checkbox" id="option-job-type-2" name="vehicle"
                                    value=""> Fulltime</label><br>
                            <label for="option-job-type-3"><input type="checkbox" id="option-job-type-3" name="vehicle"
                                    value=""> Intership</label><br>
                            <label for="option-job-type-4"><input type="checkbox" id="option-job-type-4" name="vehicle"
                                    value=""> Temporary</label><br>
                            <label for="option-job-type-5"><input type="checkbox" id="option-job-type-5" name="vehicle"
                                    value=""> Freelance</label><br>
                            <label for="option-job-type-6"><input type="checkbox" id="option-job-type-6" name="vehicle"
                                    value=""> Fixed</label><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
