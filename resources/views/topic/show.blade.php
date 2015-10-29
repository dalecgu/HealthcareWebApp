<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    <h3>主题信息</h3>
    <p>名称：{{ $topic->name }}</p>
    <p>创建者：{{ $topic->user->info->nickname }}</p>
    <p>内容：{{ $topic->content }}</p>

    <hr>

    <h3>回复</h3>
    <table>
        <thead>
            <tr>
                <td>用户</td>
                <td>内容</td>
            </tr>
        </thead>
        <tbody>
            @foreach($topic->replies as $reply)
                <tr>
                    <td>{{ $reply->user->info->nickname }}</td>
                    <td>{{ $reply->content }}</td>
                </tr>
                @foreach($reply->comments as $comment)
                    <tr>
                        <td>{{ $comment->user->info->nickname }}</td>
                        <td>回复{{ $reply->user->info->nickname }}：{{ $comment->content }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>