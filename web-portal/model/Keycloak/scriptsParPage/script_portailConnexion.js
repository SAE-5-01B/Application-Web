window.addEventListener('load', () => {
    const loginBtn = document.getElementById('login');
    const logoutBtn = document.getElementById('logout');

    keycloak.init({ onLoad: 'check-sso' }).then(authenticated => {
        if (authenticated) {
            //Gestion de l'utilisateur authentifié
            window.location.replace("http://172.23.169.58:8080/realms/CATS/protocol/openid-connect/auth?client_id=portal-cats&redirect_uri=https%3A%2F%2F172.23.169.58%3A8443%2Fview%2FUtilisateurs%2FespacePersonnelUtilisateur.html&response_mode=fragment&response_type=code&scope=openid&nonce=e8f2162f-2d69-4ed5-b1fa-8931db645871");
        } else {
            loginBtn.style.display = 'block';
            logoutBtn.style.display = 'none';
        }
    });
    loginBtn.addEventListener('click', () => keycloak.login());
    logoutBtn.addEventListener('click', () => keycloak.logout());
});
