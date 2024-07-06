document.addEventListener('DOMContentLoaded', async function () {
    let currentURL = window.location.href;
    let profileId = currentURL.substring(currentURL.lastIndexOf('/') + 1);
    
    try {
        let response = await fetch('/PawAlert/FePA/src/public/fetch-profile/' + profileId, {
            method: 'GET'
        });
        
        let result = await response.json();
        
        let user = JSON.parse(result);
        
        let profileImageElement = document.getElementById('profile-image');
        profileImageElement.src = 'data:image/jpeg;base64,' + user.profileImage;
        let nameElement = document.getElementById('name');
        nameElement.innerText = user.name;
        
    } catch (error) {
        console.error('Error:', error); 
    }
});