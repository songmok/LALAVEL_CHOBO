<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>게시글 수정</title>
</head>

<body>

    <h1>게시글 수정</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="title">제목</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}">
        </div>

        <br>

        <div>
            <label for="content">내용</label>

            <textarea
                id="content"
                name="content"
                rows="10"
                cols="50">{{ old('content', $post->content) }}</textarea>
        </div>

        <br>

        <button type="submit">
            수정 완료
        </button>

    </form>

    <br>

    <a href="{{ route('posts.show', $post) }}">
        취소
    </a>

</body>

</html>