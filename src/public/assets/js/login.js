document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('login-form').addEventListener('submit', async function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        try {
            let response = await fetch('/PawAlert/FePA/src/public/login', {
                method: 'POST',
                body: formData
            });

            let result = await response.text();

            if (response.ok) {
                sessionStorage.setItem("token", result);
                window.location.href = '/PawAlert/FePA/src/public/about';
            } else {
                document.getElementById('login-error').innerText = result;
            }
        } catch (error) {
            console.error('Error:', error); 
            document.getElementById('login-error').innerText = 'An error occurred. Please try again.';
        }
    });
});
