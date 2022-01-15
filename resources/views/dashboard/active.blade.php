@extends('dashboard.layout.app')

@section('title','dashboard')

@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Active Sets</h1>
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
                                <h3 class="card-title">All The Registered Active Sets</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th >
                                                        Sr.No
                                                    </th>
                                                    <th  >
                                                        Per Day Amount
                                                    </th>
                                                    <th  >
                                                        Total Days
                                                    </th>
                                                    <th  >
                                                        Total Users
                                                    </th>
                                                    <th  >
                                                        Days passed
                                                    </th>
                                                    <th  >
                                                        Total Amount
                                                    </th>
                                                    <th  >
                                                        Refund Amount
                                                    </th>
                                                    <th  >
                                                        1st Hopee
                                                    </th>
                                                    <th  >
                                                        2nd Hopee
                                                    </th>
                                                    <th  >
                                                        3rd Hopee
                                                    </th>
                                                    <th  >
                                                        Security Left
                                                    </th>
                                                    <th  >
                                                        Today Payment
                                                    </th>
                                                    <th  >
                                                        Total Amount Deposited
                                                    </th>
                                                </tr>
                                                </thead>
                                                <?php $script = 1; ?>
                                                <tbody>
                                                @foreach($sets as $set)

                                                    @if($set->id%2 == 0)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{$script++}}</td>
                                                            <td>{{$set->perday}}</td>
                                                            <td>{{$set->totalday}}</td>
                                                            <td>{{$set->totalusers}}</td>
                                                            <td>{{$set->dayspassed}}</td>
                                                            <td>{{$set->totalamountperperson}}</td>
                                                            <td>{{$set->returnperperson}}</td>
                                                            <td>{{$set->firsthopee}}</td>
                                                            <td>{{$set->secondhopee}}</td>
                                                            <td>{{$set->thirdhopee}}</td>
                                                            <td>{{$set->pivot->security}}</td>
                                                            <td>@if($set->pivot->todaypayment)
                                                                    Done
                                                                @else
                                                                    <a href="{{route('userdash.payment',$set->id)}}">Remaining</a>
                                                              @endif
                                                            </td>
                                                            <td>{{$set->pivot->amountdeposited}}</td>
                                                        </tr>
                                                    @else
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">{{$script++}}</td>
                                                            <td>{{$set->perday}}</td>
                                                            <td>{{$set->totalday}}</td>
                                                            <td>{{$set->totalusers}}</td>
                                                            <td>{{$set->dayspassed}}</td>
                                                            <td>{{$set->totalamountperperson}}</td>
                                                            <td>{{$set->returnperperson}}</td>
                                                            <td>{{$set->firsthopee}}</td>
                                                            <td>{{$set->secondhopee}}</td>
                                                            <td>{{$set->thirdhopee}}</td>
                                                            <td>{{$set->pivot->security}}</td>
                                                            <td>@if($set->pivot->todaypayment)
                                                                    Done
                                                                @else
                                                                    <a href="{{route('userdash.payment',$set->id)}}">Remaining</a>
                                                                @endif
                                                            </td>
                                                            <td>{{$set->pivot->amountdeposited}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
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
    var currentHtmlContent;
    var element = new Image();
    var elementWithHiddenContent = document.querySelector("#set");
    var innerHtml = elementWithHiddenContent.innerHTML;
    element.__defineGetter__("id", function() {
        currentHtmlContent= "";
    });
    setInterval(function() {
        currentHtmlContent= innerHtml;
        console.log(element);
        console.clear();
        elementWithHiddenContent.innerHTML = currentHtmlContent;
    }, 1000);
</script>
