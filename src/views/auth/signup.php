<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Paw Alert</title>
    <link rel="stylesheet" href="/PawAlert/FePA/src/public/assets/css/auth/signup/signup.css">
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
                <form class="signup-form">
                    <div class="signup-form__field">
                        <label for="last-name" class="signup-form__label">
                            Last name
                        </label>
                        <input type="text" id="last-name" class="signup-form__input" placeholder="Enter your last name" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="first-name" class="signup-form__label">
                            First name
                        </label>
                        <input type="text" id="first-name" class="signup-form__input" placeholder="Enter your first name" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="email" class="signup-form__label">
                            Email
                        </label>
                        <input type="email" id="email" class="signup-form__input" placeholder="Enter your email" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="password" class="signup-form__label">
                            Password
                        </label>
                        <input type="password" id="password" class="signup-form__input" placeholder="Enter your password" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="confirm-password" class="signup-form__label">
                            Confirm Password
                        </label>
                        <input type="password" id="confirm-password" class="signup-form__input" placeholder="Confirm your password" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="city" class="signup-form__label">
                            City
                        </label>
                        <input type="text" id="city" class="signup-form__input" placeholder="Enter your city" required>
                    </div>

                    <div class="signup-form__field">
                        <label for="state" class="signup-form__label">
                            State
                        </label>         
                        <select name="state" id="state" aria-placeholder="Select your state" class="signup-form__select" required>
                            <option value="Iasi">Iasi</option>
                            <option value="Suceava">Suceava</option>
                            <option value="Botosani">Botosani</option>
                            <option value="Vaslui">Vaslui</option>
                        </select>
                    </div>

                    <button type="submit" class="signup-form__submit">
                        Sign up
                    </button>
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
