<div class="row">
   @forelse($kameetis as $kameeti)
        <div class="col-md-4 my-2">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">{{"Name Of Kameeti: ".$kameeti->name}}</h5>
                    <h6 class="card-subtitle my-3 ">Total Kameeti Amount: <strong>{{$kameeti->price}}</strong> </h6>
                    <p class="card-text">Amount to be paid per month: <strong>{{"Rs:".$kameeti->amount}}</strong> </p>
                    <p class="card-text">Kameeti Duration: <strong>{{$kameeti->duration}}</strong> </p>
                    <a href="{{route('user.getRegisterKameeti',$kameeti->id)}}" class="card-link">Get Registered</a>
                </div>
            </div>
        </div>
   @empty
       <div class="col-md-12">
            No Kameetis Found!
       </div>
    @endforelse
</div>