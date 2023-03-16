@extends('layout_admin')

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Job Table</h4>
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
                        <a href="{{ route('job.create') }}" class="btn btn-danger text-white" target="_blank">Add New
                            Job</a>
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
                            <h4 class="card-title">Job Table</h4>
                            <h6 class="card-title m-t-40"><i
                                    class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With
                                Outside Padding</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align:center">#</th>
                                            <th scope="col" style="text-align:center">EmployId</th>
                                            <th scope="col" style="text-align:center">Title</th>
                                            <th scope="col" style="text-align:center">Job Type</th>
                                            <th scope="col" style="text-align:center">Location</th>
                                            <th scope="col" style="text-align:center">Description</th>
                                            <th scope="col" style="text-align:center">Status</th>
                                            <th scope="col" style="text-align:center">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($job as $key => $jobs)
                                            <tr>
                                                <th scope="row" style="text-align:center">{{ $jobs->id }}</th>
                                                <td style="text-align:center">{{ $jobs->employer_id }}</td>
                                                <td style="text-align:center">{{ $jobs->title }}</td>
                                                <td style="text-align:center">{{ $jobs->time }}</td>
                                                <td style="text-align:center">{{ $jobs->location }}</td>
                                                <td style="text-align:center">{{ $jobs->description }}</td>
                                                <td style="text-align:center">{{ $jobs->status }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('job.edit', ['job'=>$jobs->id]) }}"><i
                                                                class='far fa-edit'style='font-size:12px'></i></a>
                                                        <form action="{{ route('job.destroy', ['job'=>$jobs->id]) }}" method="POST">
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
                                {{ $job->withQueryString()->links() }}
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
