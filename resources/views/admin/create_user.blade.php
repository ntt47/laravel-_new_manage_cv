@extends('layout_admin')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Profile Page</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="{{ asset('admin/assets/images/users/5.jpg') }}" class="rounded-circle"
                                    width="150" />
                                <h4 class="card-title m-t-10">Hanna Gover</h4>
                                <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                class="icon-people"></i>
                                            <font class="font-medium">254</font>
                                        </a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                class="icon-picture"></i>
                                            <font class="font-medium">54</font>
                                        </a></div>
                                </div>
                            </center>
                        </div>
                        <div>
                            <hr>
                        </div>
                        {{-- <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6></h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6></h6>
                            <br />
                        </div> --}}
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" action="{{ route('user.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" name="user_name"
                                            value="">
                                        @error('user_name')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder=""
                                            class="form-control form-control-line" name="email"
                                            value="">
                                        @error('email')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder=""
                                            class="form-control form-control-line" name="password"
                                            value="">
                                        @error('password')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line" value=""
                                            name="phone_number">
                                        @error('phone_number')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Degree</label>
                                    <div class="col-md-12">
                                        <input rows="5" class="form-control form-control-line" name="degree"
                                            value="">
                                        @error('degree')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Experience</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="experience"
                                            value="">
                                        @error('experience')
                                            <p style="color: #dd3675;padding-top:4px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-select shadow-none form-control-line" name="role">
                                            <option name="role" value="0">Candidate</option>
                                            <option name="role" value="1">Employer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success text-white">Create User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
