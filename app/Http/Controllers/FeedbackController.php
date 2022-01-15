<?php

namespace App\Http\Controllers;

use App\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Feedback as FeedbackResource;
class FeedbackController extends Controller
{



    public function setRating(Request $request){

        $data = $request->validate([
            'user' => 'required:integer',
            'text' => 'required:string',
            'rating' => 'required:numeric',
        ]);
            $feedback=Feedback::where('user_id',$data['user'])->get()->first();
        if ($feedback){
            $feedback->date=Carbon::now()->timezone('pkt')->toDate();
            $feedback->text=$data['text'];
            $feedback->rating=$data['rating'];
            $feedback->save();
            return new FeedbackResource($feedback);
        } else {
            return new FeedbackResource(Feedback::create([
                'user_id' => $data['user'],
                'date' => Carbon::now()->timezone('pkt')->toDate(),
                'text' => $data['text'],
                'rating' => $data['rating']
            ]));
        }
    }
    public function getRating(){
        return FeedbackResource::collection(Feedback::all()->where('set_id',null));
    }
}
