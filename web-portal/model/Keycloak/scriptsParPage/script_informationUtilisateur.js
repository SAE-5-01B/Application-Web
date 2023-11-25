window.addEventListener('load', () => {
    const logoutBtn = document.getElementById('logout');
    // Initialiser Keycloak et vérifier si l'utilisateur est connecté
    keycloak.init({ onLoad: 'check-sso' }).then(authenticated => {
        if (authenticated) {
            // Récupérer les informations de l'utilisateur
            const userInfo = KeycloakService.getUserInfo();
            // Récupérer les éléments HTML :
            const prenom = document.getElementById('prenom');
            const nom = document.getElementById('nom');
            const email = document.getElementById('email');
            const groupes = document.getElementById('groupes');
            //Mettre à jour les éléments HTML :
            prenom.textContent += userInfo.firstNameAndLastName.split(" ")[0];
            nom.textContent += userInfo.firstNameAndLastName.split(" ")[1];
        } else {
            // Redirection si non authentifié
            window.location.replace("https://localhost:8443/index.html");
        }
    });
    // Gérer le clic sur le bouton de déconnexion
    logoutBtn.addEventListener('click', () => {
        keycloak.logout();
    });
});


document.getElementById("boutonChangementMDP").addEventListener("click", function() {
    window.location.replace("http://localhost:8080/realms/CATS/protocol/openid-connect/auth?client_id=b74fb1bc-6057-4234-bef6-17d9cd47d9b6&redirect_uri=https%3A%2F%2Flocalhost%3A8443%2Fview%2FUtilisateurs%2FinformationsUtilisateur.html&response_mode=fragment&response_type=code&scope=openid&nonce=e8f2162f-2d69-4ed5-b1fa-8931db645871&kc_action=UPDATE_PASSWORD&code_challenge=XbvFfVo7eZX4DJLtJITjMkOfICgQl4cOJy2AeF-vlIg&code_challenge_method=S256");
});


//http://localhost:8080/realms/CATS/protocol/openid-connect/auth?client_id=account-console
// &redirect_uri=http%3A%2F%2Flocalhost%3A8080%2Frealms%2FCATS%2Faccount%2F%3Freferrer%3Dsecurity-admin-console%26referrer_uri%3Dhttp%253A%252F%252Flocalhost%253A8080%252Fadmin%252FCATS%252Fconsole%252F%253Ferror%253Dinvalid_request%2526error_description%253DMissing%252Bparameter%25253A%252Bresponse_type%2526iss%253Dhttp%25253A%25252F%25252Flocalhost%25253A8080%25252Frealms%25252FCATS%23%2Fsecurity%2Fsigningin
// &state=690fc8c2-56cd-409e-8ac5-5a7af5d66083
// &response_mode=fragment
// &response_type=code
// &scope=openid
// &nonce=e8f2162f-2d69-4ed5-b1fa-8931db645871
// &kc_action=UPDATE_PASSWORD
// &code_challenge=XbvFfVo7eZX4DJLtJITjMkOfICgQl4cOJy2AeF-vlIg
// &code_challenge_method=S256