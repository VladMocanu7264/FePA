<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main - Paw Alert</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/posts/main_page/main_page.css">
</head>
<body>
    <div class="main-page">
        <div class="filter-section">
            <button id="create-post-btn" onclick="window.location.href='/PawAlert/FePA/src/public/post/create'">Create New Post</button>
            <h2>Filter by Tags</h2>
            <form id="filter-form">
                <div id="tags-list"></div>
                <button type="submit">Filter</button>
            </form>
        </div>
        <div class="posts-section" id="posts-section"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/PawAlert/FePA/src/public/assets/js/main.js"></script>
</body>
</html>
