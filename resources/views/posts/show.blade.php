<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
</head>

<body>

    <h1>{{ $post->title }}</h1>

    <hr>

    <p>
        {{ $post->content }}
    </p>

    <hr>

    <p>
        작성일: {{ $post->created_at }}
    </p>

    <a href="{{ route('posts.index') }}">
        목록으로
    </a>

    <a href="{{ route('posts.edit', $post) }}">
        수정
    </a>

    <form
        action="{{ route('posts.destroy', $post) }}"
        method="POST"
        onsubmit="return confirm('정말 삭제하시겠습니까?');">
        @csrf
        @method('DELETE')

        <button type="submit">
            삭제
        </button>
    </form>
</body>

</html>