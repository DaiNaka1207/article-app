<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <!-- Tailwindcss Latest -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col items-center bg-sky-200">

    <!-- Username input-box -->
    <div class="w-full px-5 m-5 md:w-2/5 md:px-0 md:m-10">
        <h1 class="font-medium capitalize mb-2">{{config('app.name')}}</h1>
        <form class="bg-neutral-50 p-5 rounded-lg" action="" method="post">
            @csrf
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                </span>
                <input type="text" id="username" name="username" class="mr-3 rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dainaka" required>
                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">表示</button>
            </div>
        </form>
    </div>

    <!-- Article -->
    @if (isset($articles))
        <div class="w-full px-5 m-3 md:w-2/5 md:px-0 md:m-5">
            <h2 class="font-medium capitalize mb-2">article</h2>
            @foreach ($articles as $article)
                <a class="block bg-neutral-50 p-5 rounded-lg mb-5" href={{"http://zenn.dev".$article['path']}} target="_blank" rel="noopener noreferrer">
                    <h3 class="font-medium text-lg mb-2">{{$article['emoji']}} {{$article['title']}}</h3>
                    <p class="text-sm">
                        <span class="mr-5">📝{{Str::substr($article['published_at'], 0, 10)}}</span>
                        <span class="mr-5">🖊️{{$article['body_letters_count']}}</span>
                        <span class="mr-5">🗨️{{$article['comments_count']}}</span>
                        <span class="mr-5">🩷{{$article['liked_count']}}</span>
                    </p>
                </a>
            @endforeach
        </div>
    @endif
    
    <!-- Scrap -->
    @if (isset($scraps))
        <div class="w-full px-5 m-3 md:w-2/5 md:px-0 md:m-5">
            <h2 class="font-medium capitalize mb-2">scrap</h2>
            @foreach ($scraps as $scrap)
                <a class="block bg-neutral-50 p-5 rounded-lg mb-5" href={{"http://zenn.dev".$scrap['path']}} target="_blank" rel="noopener noreferrer">
                    <h3 class="font-medium text-lg mb-2">{{$scrap['title']}}</h3>
                    <p class="text-sm">
                        <span class="mr-5">📝{{Str::substr($scrap['created_at'], 0, 10)}}</span>
                        <span class="mr-5">🔄️{{Str::substr($scrap['last_comment_created_at'], 0, 10)}}</span>
                        <span class="mr-5">🗨️{{$scrap['comments_count']}}</span>
                        <span class="mr-5">🩷{{$scrap['liked_count']}}</span>
                    </p>
                </a>
            @endforeach
        </div>
    @endif

    <footer class="w-2/5 mb-10 flex justify-center">
        <a href="https://portfolio.dainaka.live/" target="_blank" rel="noopener noreferrer">&copy 2023 DaiNaka</a>
    </footer>
</body>
</html>