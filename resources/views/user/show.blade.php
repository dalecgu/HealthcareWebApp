@extends('_layout.structure')

@section('title', '健康助手|用户管理')

@section('content')
  <div class="container table-responsive">
    <table class="table table-hover table-bordered">
      <tr>
        <td>#</td>
        <td>{{ $user->id }}</td>
      </tr>
      <tr>
        <td>角色</td>
        <td>{{ $user->roles->first()->display_name }}</td>
      </tr>
      <tr>
        <td>用户名</td>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <td>邮箱</td>
        <td>{{ $user->email }}</td>
      </tr>
    </table>
    <button type="button" class="btn btn-success">重置密码</button>
  </div>
@stop