document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('create-post-form').addEventListener('submit', async function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        try {
            let response = await fetch('/PawAlert/FePA/src/public/post/create', {
                method: 'POST',
                body: formData,
            });

            let result = await response.json();

            let messageDiv = document.getElementById('message');
            if (response.ok) {
                messageDiv.innerHTML = '<p style="color: green;">' + result.message + '</p>';
            } else {
                messageDiv.innerHTML = '<p style="color: red;">' + result.message + '</p>';
            }
        } catch (error) {
            console.error('Error:', error);
            let messageDiv = document.getElementById('message');
            messageDiv.innerHTML = '<p style="color: red;">An error occurred. Please try again.</p>';
        }
    });
});
