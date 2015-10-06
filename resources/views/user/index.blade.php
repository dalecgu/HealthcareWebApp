@extends('_layout.structure')

@section('title', '健康助手|用户管理')

@section('content')
  <div class="container">
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <td>#</td>
            <td>用户名</td>
            <td>角色</td>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
              <td>{{ $user->roles->first()->display_name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop