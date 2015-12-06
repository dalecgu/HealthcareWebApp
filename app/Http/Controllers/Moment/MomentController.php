<?php

namespace App\Http\Controllers\Moment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Response;
use Input;
use Auth;
use Validator;

use App\Moment;
use App\AgreeMoment;
use App\Comment;

class MomentController extends Controller
{
    public function store(Request $request)
    {
        $moment = new Moment();
        $moment->user_id = Auth::user()->id;
        $moment->content = $request->input('content');
        $moment->save();

        $file = Input::file('moment_file');
        $input = array('image' => $file);
        $rules = array('image' => 'image');
        $destinationPath = 'image/moment/';
        $filename = strval($moment->id).'.jpg';
        if ($file) {
            $file->move($destinationPath, $filename);
        }

        return Redirect::back();
    }

    public function agree($id, Request $request)
    {
        $agreeMoment = new AgreeMoment();
        $agreeMoment->user_id = Auth::user()->id;
        $agreeMoment->moment_id = $id;
        $agreeMoment->save();
        return Response::json(array());
    }

    public function reply($id, Request $request)
    {
        $comment = new Comment();
        $comment->moment_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->quote = 0;
        $comment->content = $request->input('content');
        $comment->save();
        return Response::json(array());
    }
}
