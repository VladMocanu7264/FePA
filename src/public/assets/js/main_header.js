document.addEventListener('DOMContentLoaded', function () {
    let user = JSON.parse(sessionStorage.getItem("user"));
    
    if (user && user.profileImage) {
        let profileImageElement = document.getElementById('profile-image');
        profileImageElement.src = 'data:image/jpeg;base64,' + user.profileImage;
    } else {
        console.log(user);
    }
});
