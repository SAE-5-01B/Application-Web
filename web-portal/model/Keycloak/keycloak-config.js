const keycloakConfig = {
    url: 'http://localhost:8080/auth', // URL de votre serveur Keycloak
    realm: 'master', // Le nom de votre realm
    clientId: 'aae06b07-e193-4bdd-9c18-bbff9597f84e', // L'ID de votre client Keycloak
};

const keycloak = new Keycloak(keycloakConfig);
