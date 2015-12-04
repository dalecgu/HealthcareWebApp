<?php

namespace App\Http\Controllers\Topic;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Topic;

class TopicController extends Controller
{
    public function show($id)
    {
        return view('topic.show', ['topic'=>Topic::where('id', $id)->first()]);
    }
}
