<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    @if($user = Auth::user())
        <h3>账号信息</h3>
        <p>用户编号：{{ $user->id }}</p>
        <p>用户姓名：{{ $user->name }}</p>
        <p>用户邮箱：{{ $user->email }}</p>
        <p>用户密码：{{ $user->password }}(<i>MD5加密存储</i>)</p>

        <hr>

        <h3>个人信息</h3>
        <p>昵称：{{ $user->info->nickname }}</p>
        <p>性别：{{ $user->info->gendor }}</p>
        <p>年龄：{{ $user->info->age }}</p>
        <p>生日：{{ $user->info->birthday }}</p>
        <p>所在地：{{ $user->info->location }}</p>
        <p>家乡：{{ $user->info->hometown }}</p>
        <p>职业：{{ $user->info->occupation }}</p>
        <p>个人简介：{{ $user->info->description }}</p>

        <hr>

        <h3>朋友信息</h3>
        <table>
            <thead>
                <tr>
                    <td>姓名</td>
                    <td>个人简介</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->friends as $friend)
                    @if($friend_info = App\User::find($friend->friend_id)->info)
                        <tr>
                            <td>{{ $friend_info->nickname }}</td>
                            <td>{{ $friend_info->description }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <hr>

        <h3>教练信息</h3>
        @if($coach_info = App\User::find($user->coach->coach_id)->info)
            <p>昵称：{{ $coach_info->nickname }}</p>
            <p>性别：{{ $coach_info->gendor }}</p>
            <p>年龄：{{ $coach_info->age }}</p>
            <p>所在地：{{ $coach_info->location }}</p>
            <p>公司：{{ $coach_info->company }}</p>
            <p>个人简介：{{ $coach_info->description }}</p>
        @endif

        <hr>

        <h3>医生信息</h3>
        @if($doctor_info = App\User::find($user->doctor->doctor_id)->info)
            <p>昵称：{{ $doctor_info->nickname }}</p>
            <p>性别：{{ $doctor_info->gendor }}</p>
            <p>年龄：{{ $doctor_info->age }}</p>
            <p>所在地：{{ $doctor_info->location }}</p>
            <p>公司：{{ $doctor_info->company }}</p>
            <p>个人简介：{{ $doctor_info->description }}</p>
        @endif

        <hr>

        <h3>动态</h3>
        <table>
            <thead>
                <tr>
                    <td>内容</td>
                    <td>发布时间</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->moments as $moment)
                    <tr>
                        <td>{{ $moment->content }}</td>
                        <td>{{ $moment->created_at }}</td>
                        <td><a href="/moment/{{ $moment->id }}">查看</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h3>参与活动</h3>
        <table>
            <thead>
                <tr>
                    <td>活动标题</td>
                    <td>活动描述</td>
                    <td>开始时间</td>
                    <td>结束时间</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->activities as $activity)
                    <tr>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->begin_time }}</td>
                        <td>{{ $activity->end_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h3>所在兴趣组</h3>
        <table>
            <thead>
                <tr>
                    <td>名称</td>
                    <td>标签</td>
                    <td>描述</td>
                    <td>创建人</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->tag }}</td>
                        <td>{{ $group->description }}</td>
                        <td>{{ App\User::find($group->creator_id)->info->nickname }}</td>
                        <td><a href="/group/{{ $group->id }}">查看</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h3>建议</h3>
        <table>
            <thead>
                <tr>
                    <td>建议人</td>
                    <td>建议内容</td>
                    <td>建议时间</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->advices as $advice)
                    <tr>
                        <td>{{ $advice->advisor->info->nickname }}</td>
                        <td>{{ $advice->content }}</td>
                        <td>{{ $advice->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>