<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>
</head>

<body>

    <h1>글쓰기</h1>

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">제목</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}">
        </div>

        <br>

        <div>
            <label for="content">내용</label>

            <textarea
                id="content"
                name="content"
                rows="10"
                cols="50">{{ old('content') }}</textarea>
        </div>

        <br>

        <button type="submit">
            등록
        </button>

    </form>

    <br>

    <a href="{{ route('posts.index') }}">
        목록으로
    </a>

</body>

</html>