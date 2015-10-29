<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    <h3>兴趣组信息</h3>
    <p>名称：{{ $group->name }}</p>
    <p>分类：{{ $group->tag }}</p>
    <p>描述：{{ $group->description }}</p>
    <p>创建者：{{ App\User::find($group->creator_id)->info->nickname }}</p>
    <p>人数：{{ $group->users->count() }}</p>

    <hr>

    <h3>组内用户</h3>
    <table>
        <thead>
            <tr>
                <td>姓名</td>
                <td>个人简介</td>
            </tr>
        </thead>
        <tbody>
            @foreach($group->users as $user)
                @if($user_info = App\User::find($user->id)->info)
                    <tr>
                        <td>{{ $user_info->nickname }}</td>
                        <td>{{ $user_info->description }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <hr>

    <h3>主题</h3>
    <table>
        <thead>
            <tr>
                <td>主题名称</td>
                <td>创建者</td>
                <td>发表时间</td>
                <td>内容</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            @foreach($group->topics as $topic)
                <tr>
                    <td>{{ $topic->title }}</td>
                    <td>{{ $topic->user->info->nickname }}</td>
                    <td>{{ $topic->created_at }}</td>
                    <td>{{ $topic->content }}</td>
                    <td><a href="/topic/{{ $topic->id }}">查看</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>