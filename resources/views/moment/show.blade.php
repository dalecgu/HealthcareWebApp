<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    <h3>动态详情</h3>
    <p>作者：{{ $moment->user->info->nickname }}</p>
    <p>动态内容：{{ $moment->content }}</p>
    <p>赞数：{{ $moment->agreed_by_users->count() }}</p>

    <hr>

    <h3>赞的用户</h3>
    <table>
        <thead>
            <tr>
                <td>姓名</td>
                <td>个人简介</td>
            </tr>
        </thead>
        <tbody>
            @foreach($moment->agreed_by_users as $user)
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

    <h3>评论</h3>
    <table>
        <thead>
            <tr>
                <td>评论人</td>
                <td>评论时间</td>
                <td>评论内容</td>
            </tr>
        </thead>
        <tbody>
            @foreach($moment->comments as $comment)
                <tr>
                    <td>{{ $comment->user->info->nickname }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>{{ $comment->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>