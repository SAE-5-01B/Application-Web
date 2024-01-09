const keycloakConfig = {
    url: 'http://172.23.169.58:8080/', // URL de votre serveur Keycloak
    realm: 'CATS', // Le nom de votre realm
    clientId: 'portal-cats', // L'ID de votre client Keycloak
};
const keycloak = new Keycloak(keycloakConfig);
