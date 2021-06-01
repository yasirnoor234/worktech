<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
 <div style="width:900px" class="container max-w-full mx-auto pt-4">


 <form action="/posts" method="POST">
 @csrf 
<div class="mb-4">
    <label class="font-bold text-gray-800" for="title">Title: </label>
    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full 
    text-gray-600 text-sm foucs:outline-none foucs:border-gray-400 foucs:ring-0" id="title" name="title">
</div>
<div class="mb-4">
    <label class="font-bold text-gray-800" for="title">Content: </label>
    <textarea class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full 
    text-gray-600 text-sm foucs:outline-none foucs:border-gray-400 foucs:ring-0" id="title" name="title"></textarea>
</div>

<button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
    Update
</button>
</form>
 </div>

</body>
</html>