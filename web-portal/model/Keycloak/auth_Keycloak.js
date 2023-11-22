window.addEventListener('load', () => {
    const loginBtn = document.getElementById('login');
    const logoutBtn = document.getElementById('logout');
    const userInfoDiv = document.getElementById('userInfo');

    keycloak.init({ onLoad: 'check-sso' }).then(authenticated => {
        if (authenticated) {
            updateUI(true);
            displayUserInfo();
        } else {
            updateUI(false);
        }
    });
    loginBtn.addEventListener('click', () => {
        keycloak.login();
    });

    logoutBtn.addEventListener('click', () => {
        keycloak.logout();
    });

    function updateUI(authenticated) {
        loginBtn.style.display = authenticated ? 'none' : 'block';
        logoutBtn.style.display = authenticated ? 'block' : 'none';
        userInfoDiv.innerHTML = '';
    }

    function displayUserInfo() {
        userInfoDiv.innerHTML = `<p>Token: ${keycloak.token}</p>`;
        userInfoDiv.innerHTML += `<p>Refresh Token: ${keycloak.refreshToken}</p>`;
        userInfoDiv.innerHTML += `<p>ID Token: ${keycloak.idToken}</p>`;
        userInfoDiv.innerHTML += `<p>Username: ${keycloak.tokenParsed.preferred_username}</p>`;
        userInfoDiv.innerHTML += `<p>Email: ${keycloak.tokenParsed.email}</p>`;
        userInfoDiv.innerHTML += `<p>Roles: ${keycloak.tokenParsed.realm_access.roles.join(', ')}</p>`;

    }
});
