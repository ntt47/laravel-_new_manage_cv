@extends('layout')

@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                    <h1 class="mb-3 bread">Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <head>
        <style>
            .container.py-5.new {
                background-color: white;
            }
        </style>
    </head>
    <div class="container-xxl bg-white p-0">
        <!-- END nav -->
        <section style="background-color: #eee;">
            <div class="container py-5 new">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center" style="height:356px">
                                @foreach ($img as $imgs)
                                    <img src="{{ asset('storage/' . $imgs) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 200px; height:200px">
                                @endforeach
                                <h5 class="my-3" style="color: red"></h5>
                                <p class="text-muted mb-1"></p>
                                <p class="text-muted mb-4"><a href=""></a></p>
                                <div class="d-flex justify-content-center mb-2">
                                    @foreach ($user as $users)
                                        <form action="{{ route('profile.update', ['profile' => $users->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="file" class="" id="uploadImage"
                                                accept=".jpg, .png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Họ và tên</p>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $users->id }}">
                                    <div class="col-sm-9">
                                        <input name="user_name" style="border:none; width:440px" class="text-muted mb-0"
                                            value="{{ $users->user_name }}" />
                                        @error('user_name')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $users->email }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Số điện thoại</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="phone_number" style="border:none; width:440px" class="text-muted mb-0"
                                            value="{{ $users->phone_number }}" />
                                        @error('phone_number')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Bằng cấp</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="degree" style="border:none; width:440px" class="text-muted mb-0"
                                            value="{{ $users->degree }}" />
                                        @error('degree')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Kinh nghiệm</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="experience" style="border:none; width:440px" class="text-muted mb-0"
                                            value="{{ $users->experience }}" />
                                        @error('experience')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-secondary"
                    style="float:right;color: #00B074;background-color: aliceblue">Cập
                    nhật</button>
                </form>
                @endforeach
            </div>
        </section>
    </div>
@endsection
