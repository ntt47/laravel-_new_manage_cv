@extends('layout_admin')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">User Table</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-7">
                    <div class="text-end upgrade-btn">
                        <a href="{{ route('user.create') }}" class="btn btn-danger text-white" target="_blank">Add New
                            User</a>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User Table</h4>
                            <h6 class="card-title m-t-40"><i
                                    class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With
                                Outside Padding</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align:center">#</th>
                                            <th scope="col" style="text-align:center">Name</th>
                                            <th scope="col" style="text-align:center">Email</th>
                                            <th scope="col" style="text-align:center">Phone</th>
                                            <th scope="col" style="text-align:center">Role</th>
                                            <th scope="col" style="text-align:center">Degree</th>
                                            <th scope="col" style="text-align:center">Experience</th>
                                            <th scope="col" style="text-align:center">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $key => $users)
                                            <tr>
                                                <th scope="row" style="text-align:center">{{ $key++ }}</th>
                                                <td style="text-align:center">{{ $users->user_name }}</td>
                                                <td style="text-align:center">{{ $users->email }}</td>
                                                <td style="text-align:center">{{ $users->phone_number }}</td>
                                                <td style="text-align:center">
                                                    @if ($users->role == 0)
                                                        Candidate
                                                    @elseif($users->role == 1)
                                                        Employer
                                                    @endif
                                                </td>
                                                <td style="text-align:center">{{ $users->degree }}</td>
                                                <td style="text-align:center">{{ $users->experience }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('user.edit', ['user' => $users->id]) }} "><i
                                                                class='far fa-edit'style='font-size:12px'></i></a>
                                                        <form action="{{ route('user.destroy', ['user' => $users->id]) }} "
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button><i style='font-size:12px'
                                                                    class='far'>&#xf2ed;</i></button>
                                                        </form>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            All Rights Reserved by Xtreme Admin. Designed and Developed by < href="https://www.wrappixel.com">WrapPixel</>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
