<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Group;
use App\UserJoinGroups;

use Auth;
use Response;
use Redirect;
use Input;
use Validator;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index');
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->input('name');
        $group->tag = $request->input('tag');
        $group->description = $request->input('description');
        $group->creator_id = Auth::user()->id;
        $group->save();

        $file = Input::file('group_file');
        $input = array('image' => $file);
        $rules = array('image' => 'image');
        $validator = Validator::make($input, $rules);
        // if ($validator->fails()) {
        //     return Response::json([
        //         'success' => false,
        //         'errors' => $validator->getMessageBag()->toArray()
        //     ]);
        // }
        $destinationPath = 'image/group/';
        $filename = strval($group->id).'.jpg';
        $file->move($destinationPath, $filename);
        return Redirect::back();
    }

    public function show($id)
    {
        return view('group.show')->with('group', Group::find($id));
    }

    public function joinGroup($id)
    {
        $userJoinGroups = new UserJoinGroups();
        $userJoinGroups->user_id = Auth::user()->id;
        $userJoinGroups->group_id = $id;
        $userJoinGroups->save();
        return Response::json(array());
    }

    public function exitGroup($id)
    {
        UserJoinGroups::where('user_id', Auth::user()->id)
            ->where('group_id', $id)
            ->delete();
        return Response::json(array());
    }
}
