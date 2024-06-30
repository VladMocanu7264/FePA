<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Paw Alert</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/auth/signup/signup.css">
    <script src="/PawAlert/FePA/src/public/assets/js/signup.js" defer></script>
</head>
<body>
    <div class="signuppage">
        <div class="main-part">
            <div class="signup-page__left">
                <img src="/PawAlert/FePA/src/public/assets/images/curious_dog.jpg" alt="Image missing" class="signup-page__image">
                <h1 class="signup-page__title">
                    Welcome to Paw Alert!
                </h1>
            </div>
            <div class="signup-page__right">
                <form class="signup-form" id="signup-form" enctype="multipart/form-data">
                    <div class="signup-form__field">
                        <label for="email" class="signup-form__label">
                            Email
                        </label>
                        <input type="email" id="email" name="email" class="signup-form__input" placeholder="Enter your email" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="password" class="signup-form__label">
                            Password
                        </label>
                        <input type="password" id="password" name="password" class="signup-form__input" placeholder="Enter your password" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="confirm-password" class="signup-form__label">
                            Confirm Password
                        </label>
                        <input type="password" id="confirm-password" name="confirm-password" class="signup-form__input" placeholder="Confirm your password" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="name" class="signup-form__label">
                            Name
                        </label>
                        <input type="text" id="name" name="name" class="signup-form__input" placeholder="Enter your name" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="profileImage" class="signup-form__label">
                            Profile Image
                        </label>
                        <input type="file" id="profileImage" name="profileImage" class="signup-form__input">
                    </div>

                    <div class="signup-form__field">
                        <label for="country" class="signup-form__label">
                            Country
                        </label>
                        <input type="text" id="country" name="country" class="signup-form__input" placeholder="Enter your country" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="city" class="signup-form__label">
                            City
                        </label>
                        <input type="text" id="city" name="city" class="signup-form__input" placeholder="Enter your city" required>
                    </div>

                    <div id="signup-error" class="error-message"></div>
                    <button type="submit" class="signup-form__submit">Sign up</button>
                </form>

                <p class="login-text">
                    Already have an account? 
                    <a class="login-text__link" href="/PawAlert/FePA/src/public/login">
                        Login here
                    </a>.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
