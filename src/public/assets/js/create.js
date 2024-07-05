document.addEventListener('DOMContentLoaded', function () {
    // Initialize the Select2 plugin on the tags dropdown
    $('#tags').select2();

    // Initialize the map
    var map = L.map('map').setView([47.156944, 27.590278], 13); // Centered on Iasi, Romania

    // Set up the OpenStreetMap layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker;
    var form = document.getElementById('create-post-form');
    var submitButton = form.querySelector('button[type="submit"]');
    var latitude, longitude;

    // Add click event to the map to place a marker and get coordinates
    map.on('click', function(e) {
        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;

        if (latitude && longitude) {
            submitButton.disabled = false; // Enable the submit button once a marker is placed
        }
    });

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        if (!latitude || !longitude) {
            alert('Please select a location on the map.');
            return;
        }

        let formData = new FormData(this);
        formData.append('latitude', latitude);
        formData.append('longitude', longitude);

        try {
            let response = await fetch('/PawAlert/FePA/src/public/post/create', {
                method: 'POST',
                body: formData,
            });

            let result = await response.json();

            var messageDiv = document.getElementById('message');
            if (response.ok) {
                messageDiv.innerHTML = '<p style="color: green;">' + result.message + '</p>';
            } else {
                messageDiv.innerHTML = '<p style="color: red;">' + result.message + '</p>';
            }
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('message').innerText = 'An error occurred. Please try again.';
        }
    });
});
