const keycloakConfig = {
    url: 'http://localhost:8080/auth',
    realm: 'master',
    clientId: 'aae06b07-e193-4bdd-9c18-bbff9597f84e',
};

const keycloak = new Keycloak(keycloakConfig);
