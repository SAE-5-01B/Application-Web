#####################################
# Script d'initialisation du projet #
#####################################

# Demande à l'utilisateur l'adresse IP du serveur pour Rocket.Chat
read -p "Adresse IP du serveur Rocket.Chat (keycloak pour l'environnement de test sinon l'adresse IP du serveur) : " ipRocketChat
echo "IP Rocket.Chat saisie : $ipRocketChat"

# Demande à l'utilisateur l'adresse IP du serveur pour les autres services (Web, Nextcloud, RocketChat, Keycloak)
read -p "Adresse IP du serveur pour les autres services (Web, Nextcloud, RocketChat, Keycloak) (soit localhost ou l'adresse IP du serveur) : " ipServeur
echo "IP serveur saisie : $ipServeur"

# Lecture et modification du fichier .env
while IFS= read -r line; do
    # Modification de ROCKET_CHAT_SERVER_IP
    if [[ "$line" == "ROCKET_CHAT_SERVER_IP="* ]]; then
        echo "ROCKET_CHAT_SERVER_IP=$ipRocketChat"
    # Modification de SERVER_IP
    elif [[ "$line" == "SERVER_IP="* ]]; then
        echo "SERVER_IP=$ipServeur"
    else
        echo "$line"
    fi
done < .env > .env.tmp

# Remplacement du fichier .env par le fichier temporaire modifié
mv .env.tmp .env

# Lancement du docker-compose
docker-compose up -d
