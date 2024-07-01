<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - Paw Alert</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/posts/create/create.css">
</head>
<body>
    <div class="create-post-page">
        <h1 class="create-post-title">Create a New Post</h1>
        <form id="create-post-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit">Create Post</button>
        </form>
        <div class="message"></div>
    </div>
    <script src="/PawAlert/FePA/src/public/assets/js/posts/create.js"></script>
</body>
</html>
