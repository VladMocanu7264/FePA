document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('login-form').addEventListener('submit', async function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        try {
            let response = await fetch('/PawAlert/FePA/src/public/login', {
                method: 'POST',
                body: formData
            });

            let token = await response.text();

            if (response.ok) {
                sessionStorage.setItem("token", token);

                let payload = JSON.parse(atob(token.split('.')[1]));
                
                sessionStorage.setItem("user", JSON.stringify({
                    id: payload.id,
                    email: payload.email,
                    name: payload.name,
                    profileImage: payload.profileImage,
                    country: payload.country,
                    city: payload.city,
                    isAdmin: payload.isAdmin
                }));

                window.location.href = '/PawAlert/FePA/src/public/main';
            } else {
                document.getElementById('login-error').innerText = token;
            }
        } catch (error) {
            console.error('Error:', error); 
            document.getElementById('login-error').innerText = 'An error occurred. Please try again.';
        }
    });
});
