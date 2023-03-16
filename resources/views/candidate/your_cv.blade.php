@extends('layout')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                    <h1 class="mb-3 bread">Your's CV</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-lg-4">
                    @foreach ($cvs as $key => $cv)
                        <form action="{{ route('pickMainCv') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 ftco-animate">
                                    <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                        <div class="one-third mb-4 mb-md-0">
                                            <div class="job-post-item-header align-items-center">
                                                <span class="subadge">CV: {{ $key++ }}</span>
                                                <h2 class="mr-3 text-black">{{ $cv->title }}</h2>
                                            </div>
                                            <div class="job-post-item-body d-block d-md-flex">
                                                <div><span class="icon-my_location"></span>
                                                    <span>{{ $cv->upload }}</span>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $cv->id }}">
                                            </div>
                                        </div>
                                        <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                            <div>
                                                @foreach ($id as $value)
                                                @endforeach 
                                                @if ($cv->id == $value)
                                                    <button type="submit"
                                                        style="border:none; background-color: white;color:red">
                                                        <a>
                                                            <span class="icon-heart"></span>
                                                        </a></button>
                                                @else
                                                    <button type="submit"
                                                        style="border:none; background-color: white;color:blue">
                                                        <a>
                                                            <span class="icon-heart"></span>
                                                        </a></button>
                                                @endif
                                            </div>
                                            <a href="{{ route('viewFile', ['fileName' => $cv->upload]) }}"
                                                class="btn btn-primary py-2" style="color:white">Read CV</a>
                                        </div>
                                    </div>
                                </div><!-- end -->
                            </div>
                        </form>
                    @endforeach
                    {{ $cvs->withQuerystring()->links() }}

                </div>
            </div>
        </div>
    </section>
@endsection
