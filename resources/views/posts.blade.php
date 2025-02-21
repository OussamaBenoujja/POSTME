<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Post App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded">
        <h1 class="text-xl font-bold mb-4">Create a Post</h1>
        <form action="/posts" method="POST" class="mb-6">
            @csrf
            <input type="text" name="title" placeholder="Title" class="w-full p-2 border rounded mb-2">
            <textarea name="content" placeholder="Content" class="w-full p-2 border rounded mb-2"></textarea>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Publish</button>
        </form>

        <h1 class="text-xl font-bold mb-4">Posts</h1>
        @foreach($posts as $post)
            <div class="bg-gray-50 p-4 rounded shadow mb-4">
                <h2 class="font-semibold">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <form action="/posts/{{ $post->id }}/like" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Like ({{ $post->likes->count() }})</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
