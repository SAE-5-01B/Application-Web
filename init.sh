#####################################
# Script d'initialisation du projet #
#####################################

# Demande à l'utilisateur l'adresse IP du serveur pour Rocket.Chat
read -p "Adresse IP du serveur Rocket.Chat : " ip

# Vérification si ROCKET_CHAT_SERVER_IP est déjà défini dans .env
if grep -q "ROCKET_CHAT_SERVER_IP=" .env; then
    # Remplacer la ligne existante
    sed -i "s/ROCKET_CHAT_SERVER_IP=.*/ROCKET_CHAT_SERVER_IP=$ip/" .env
else
    # Ajouter la nouvelle variable
    echo "ROCKET_CHAT_SERVER_IP=$ip" >> .env
fi

# Lancement du docker-compose
docker-compose up -d
