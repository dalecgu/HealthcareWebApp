<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Group;
use App\UserJoinGroups;

use Auth;
use Response;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index');
    }

    public function show($id)
    {
        return view('group.show', ['group'=>Group::where('id', $id)->first()]);
    }

    public function join($id)
    {
        $userJoinGroups = new UserJoinGroups();
        $userJoinGroups->user_id = Auth::user()->id;
        $userJoinGroups->group_id = $id;
        $userJoinGroups->save();
        return Response::json(array());
    }
}
