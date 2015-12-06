<?php

namespace App\Http\Controllers\Topic;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Topic;
use App\Reply;
use App\AgreeReply;

use Auth;
use Redirect;
use Response;

class TopicController extends Controller
{
    public function show($id)
    {
        return view('topic.show', ['topic'=>Topic::where('id', $id)->first()]);
    }

    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->group_id = $request->input('group_id');
        $topic->user_id = Auth::user()->id;
        $topic->title = $request->input('title');
        $topic->content = $request->input('content');
        $topic->save();
        return Redirect::back();
    }

    public function agree($id, Request $request)
    {
        $agreeReply = new AgreeReply();
        $agreeReply->user_id = Auth::user()->id;
        $agreeReply->reply_id = $request->input('reply_id');
        $agreeReply->save();
        return Response::json(array());
    }

    public function reply($id, Request $request)
    {
        $reply = new Reply();
        $reply->topic_id = $id;
        $reply->user_id = Auth::user()->id;
        $reply->quote = $request->input('quote');
        $reply->content = $request->input('content');
        $reply->save();
        return Redirect::back();
    }
}
