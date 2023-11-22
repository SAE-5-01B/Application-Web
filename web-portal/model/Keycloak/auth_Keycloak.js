window.addEventListener('load', () => {
    const loginBtn = document.getElementById('login');
    const logoutBtn = document.getElementById('logout');

    keycloak.init({ onLoad: 'check-sso' }).then(authenticated => {
        if (authenticated) {
            loginBtn.style.display = 'none';
            logoutBtn.style.display = 'block';
        } else {
            loginBtn.style.display = 'block';
            logoutBtn.style.display = 'none';
        }
    });

    loginBtn.addEventListener('click', () => {
        keycloak.login();
    });

    logoutBtn.addEventListener('click', () => {
        keycloak.logout();
    });
});
