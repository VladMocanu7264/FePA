<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title'] ?? ''); ?> - Paw Alert</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/posts/show/show.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="post-details-page">
        <h1 class="post-title"><?php echo htmlspecialchars($post['title'] ?? ''); ?></h1>
        <p class="post-date">Posted on: <?php echo htmlspecialchars($post['time'] ?? ''); ?></p>
        <p class="post-user">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($post['userProfileImage'] ?? ''); ?>" alt="User Profile" class="user-profile-image">
            <a href="/PawAlert/FePA/src/public/profile/<?php echo htmlspecialchars($post['userId']); ?>"><?php echo htmlspecialchars($post['userName'] ?? ''); ?></a>
        </p>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($post['image'] ?? ''); ?>" alt="Post Image" class="post-image">
        <p class="description-title">Details:</p>
        <p class="post-description"><?php echo htmlspecialchars($post['description'] ?? ''); ?></p>
        <div id="map"></div>
        <div class="post-tags">
            <p class="tags-title">Tags:</p>
            <?php if (!empty($post['tags'])): ?>
                <ul>
                    <?php foreach ($post['tags'] as $tag): ?>
                        <li><?php echo htmlspecialchars($tag); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No tags associated with this post.</p>
            <?php endif; ?>
        </div>
        <div class="post-comments">
            <h2>Comments</h2>
            <form id="comment-form">
                <input type="hidden" name="postId" value="<?php echo htmlspecialchars($post['id']); ?>">
                <div class="form-group">
                    <input type="text" name="comment" placeholder="Enter your comment" required>
                    <button type="submit">Submit</button>
                </div>
            </form>
            <div id="comments-list"></div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([<?php echo $post['latitude'] ?? 0; ?>, <?php echo $post['longitude'] ?? 0; ?>], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([<?php echo $post['latitude'] ?? 0; ?>, <?php echo $post['longitude'] ?? 0; ?>]).addTo(map);

        // Fetch and display comments
        function fetchComments() {
            fetch('/PawAlert/FePA/src/public/post/get-comments/<?php echo htmlspecialchars($post['id']); ?>')
                .then(response => response.json())
                .then(data => {
                    var commentsList = document.getElementById('comments-list');
                    commentsList.innerHTML = '';
                    data.forEach(comment => {
                        var commentDiv = document.createElement('div');
                        commentDiv.classList.add('comment');
                        commentDiv.innerHTML = `
                            <div class="comment-header">
                                <img src="data:image/jpeg;base64,${comment.userProfileImage}" alt="User Profile" class="comment-user-image">
                                <span class="comment-user-name">${comment.userName}</span>
                                <span class="comment-time">${new Date(comment.time).toLocaleString()}</span>
                            </div>
                            <p>${comment.comment}</p>
                        `;
                        commentsList.appendChild(commentDiv);
                    });
                });
        }

        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            fetch('/PawAlert/FePA/src/public/post/add-comment', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    fetchComments();
                    this.reset();
                } else {
                    alert(data.message);
                }
            });
        });

        fetchComments();
    </script>
</body>
</html>
