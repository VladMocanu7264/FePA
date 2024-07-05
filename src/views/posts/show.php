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
        <p class="post-time"><?php echo htmlspecialchars($post['time'] ?? ''); ?></p>
        
        <div class="post-user">
            <span class="by">by</span>
            <a href="/PawAlert/FePA/src/public/profile/<?php echo htmlspecialchars($post['userId']); ?>">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($post['userProfileImage'] ?? ''); ?>" alt="User Profile Image" class="user-profile-image">
                <span class="user-name"><?php echo htmlspecialchars($post['userName'] ?? ''); ?></span>
            </a>
        </div>
        
        <img src="data:image/jpeg;base64,<?php echo base64_encode($post['image'] ?? ''); ?>" alt="Post Image" class="post-image">
        <p class="description-title">Details:</p>
        <p class="post-description"><?php echo htmlspecialchars($post['description'] ?? ''); ?></p>
        <div id="map"></div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([<?php echo $post['latitude'] ?? 0; ?>, <?php echo $post['longitude'] ?? 0; ?>], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([<?php echo $post['latitude'] ?? 0; ?>, <?php echo $post['longitude'] ?? 0; ?>]).addTo(map);
    </script>
</body>
</html>
