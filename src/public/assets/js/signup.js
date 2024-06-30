document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('signup-form').addEventListener('submit', async function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        try {
            let response = await fetch('/PawAlert/FePA/src/public/signup', {
                method: 'POST',
                body: formData,
            });

            let result = await response.text();

            if (response.ok) {
                window.location.href = '/PawAlert/FePA/src/public/login';
            } else {
                document.getElementById('signup-error').innerText = result;
            }
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('signup-error').innerText = 'An error occurred. Please try again.';
        }
    });
});
