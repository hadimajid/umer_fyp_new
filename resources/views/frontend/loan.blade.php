@extends('frontend.layout.app')

@section('title','Loan Register')

@section('content')


    <!-- ***** Breadcumb Area Start ***** -->
    <div class="fancy-breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('frontend/img/bg-img/hero-1.webp')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>Loan</h2>
                        <h4 class="text-white">Register your Loan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <div class="fancy-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>
                        Register For Loan Here!
                    </h4>
                    <h6>READ CAREFULLY!</h6>
                </div>
                <div class="col-md-12">
                    <ol class="display-warning">
                        <li>Person must send us his/her digital signature in order to get registered in this module.</li>
                        <li>After verification of your NADRA issued ID card, you will be bound to pay all the dues related to your choice of selection regarding this module.</li>
                        <li>In case of any fraudulent activity, Lawsuit will be fined against the person registered.</li>
                        <li>Team HOPEE will not be able to assist in terms of late payments after that.</li>
                        <li>1.5% of the total loan amount will be charged to user when user will return the loan amount.</li>
                    </ol>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {!! \Session::get('success') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (\Session::has('danger'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! \Session::get('danger') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h6 class="text-center font-weight-bold">Loan Register Form</h6>
                            <form action="{{route("user.loan")}}" method="post" enctype="multipart/form-data" id="registerLoan">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnic_front">Cnic Front <small style="color: red">(file size must be less than 1mb) *</small></label>
                                            <input type="file" name="cnic_front" id="cnic_front" class="form-control form-control-file">
                                            @error('cnic_front')
                                            <label for="cnic_front" class="error" id="cnic_front-error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnic_back">Cnic back <small style="color: red">(file size must be less than 1mb) *</small></label>
                                            <input type="file" name="cnic_back" id="cnic_back" class="form-control form-control-file">
                                            @error('cnic_back')
                                            <label for="cnic_back" class="error" id="cnic_back-error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="signature">Signature <small style="color: red">(file size must be less than 1mb) *</small></label>
                                            <input type="file" name="signature" id="signature" class="form-control form-control-file">
                                            @error('signature')
                                            <label for="signature" class="error" id="signature-error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Total Amount you want for loan <small style="color: red">*</small></label>
                                            <input type="text" name="amount" id="amount" class="form-control ">
                                            @error('amount')
                                            <label for="amount" class="error" id="amount-error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p id="interest"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary " >Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->


@endsection
@section('scripts')
    <script>
        $("#registerLoan").validate({
            rules:{
                cnic_front:{
                    required: true,
                    filesize:1,
                },
                cnic_back:{
                    required: true,
                    filesize:1,
                },
                signature:{
                    required: true,
                    filesize:1,
                },
                amount:{
                    required: true,
                    min:10000,
                    number: true,
                }
            }
        });
        $("#amount").on("change",function (e) {
                let val=$(this).val();
            console.log(val)
                if(val>0){
                    let interest=(val/100)*1.5;
                    let newVal=parseFloat(interest)+parseFloat(val);
                    $("#interest").html("You Have To Return This Amount With Interest Of 1.5% which will be equal to : "+newVal)
                }else{
                    $("#interest").html("");
                }
        })
    </script>
@endsection