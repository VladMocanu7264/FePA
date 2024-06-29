<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Alert - Login</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/auth/login/login.css">
</head>
<body>
    <div class="loginpage">
        <div class="main-part">
            <div class="login-page__left">
                <img src="/PawAlert/FePA/src/public/assets/images/different_animals_1.jpg" alt="Image missing" class="login-page__image">
                <h1 class="login-page__title">
                    Help your community with Paw Alert!
                </h1>
            </div>
            <div class="login-page__right">
                <form class="login-form" action="/PawAlert/FePA/src/public/login_process.php" method="POST">
                    <div class="login-form__field">
                        <label for="email" class="login-form__label">
                            Email
                        </label>
                        <input type="email" id="email" name="email" class="login-form__input" placeholder="Enter your email" required>
                    </div>

                    <div class="login-form__field">
                        <label for="password" class="login-form__label">
                            Password
                        </label>
                        <input type="password" id="password" name="password" class="login-form__input" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="login-form__submit">
                        Login
                    </button>
                </form>

                <p class="signup-text">
                    Don't have an account? 
                    <a class="signup-text__link" href="/PawAlert/FePA/src/public/signup">
                        Sign up here
                    </a>.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
