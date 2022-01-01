@extends('dashboard.layout.app')

@section('title','Notifications')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notification</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content" id="set">



            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">See Notification Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h5 class="card-title">{{$desc}}</h5>
                            <p class="card-text">{{$diff}}</p>


                        </div>
                    </div>
                </div>
            </div>
        </section>        </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Dashboard template by AdminLTE.io Developed by Fawad Lang. All Rights Reserved</strong>
    </footer>

@endsection
<script>

</script>
