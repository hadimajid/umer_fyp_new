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
                            <h3 class="card-title">See All Notification Here</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table  class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" id="notificaton-table">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                                                    Sr.No
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">
                                                    Description
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">
                                                    Time
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">

                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($notifications as $key=>$notification)
                                                @php
                                                    $now=new \Carbon\Carbon('now');
                                                    $createdAt=new \Carbon\Carbon($notification->created_at);
                                                    $diff=$createdAt->diffForHumans($now);
                                                    $desc="";
                                                    if($notification->notifiable_type=="App\Loan")
                                                   {     $type="";
                                                        if($notification->loan->approved==1){
                                                            $type="approved";
                                                        }
                                                        if($notification->loan->approved==2){
                                                            $type="rejected";
                                                        }

                                                $desc="Loan request of amount {$notification->loan->amount} is $type";

                                                   }
                                                    elseif($notification->notifiable_type=="App\KameetiUser"){
                                                           $type="";
                                                           if($notification->kameeti->registered==1){
                                                               $type="approved";
                                                           }
                                                           if($notification->kameeti->registered==2){
                                                               $type="rejected";
                                                           }
                                                $desc="Kameeti {$notification->kameeti->kameeti->name} is $type";
                                                }
                                                @endphp
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$desc}}</td>
                                                    <td>{{$diff}}</td>
                                                    <td><a href="{{route("userdash.notificationDetails",$notification->id)}}"><i class="fa fa-eye" style="height: 10px"></i></a></td>
                                                </tr>
                                            @empty
                                                <tr>                                                <td colspan="4">No Notification Available</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7">
                                    </div>
                                </div>
                            </div>
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
