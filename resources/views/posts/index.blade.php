<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>게시판</title>
</head>

<body>

    <h1>게시판</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('posts.create') }}">
        글쓰기
    </a>

    <hr>

    @forelse ($posts as $post)

    <div>
        <h2>
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </h2>

        <p>{{ $post->content }}</p>

        <small>
            {{ $post->created_at }}
        </small>
    </div>

    <hr>

    @empty

    <p>등록된 게시글이 없습니다.</p>

    @endforelse

</body>

</html>