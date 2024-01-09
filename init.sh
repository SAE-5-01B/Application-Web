#!/bin/bash

# Récupère l'adresse IP principale de la machine
server_ip=$(hostname -I | awk '{print $1}')

# Affiche l'adresse IP récupérée
echo "Adresse IP du serveur détectée : $server_ip"

# Chemin vers le fichier .env
env_file="./.env"

# Vérifie si le fichier .env existe
if [ ! -f "$env_file" ]; then
    echo "Le fichier .env n'existe pas au chemin spécifié."
    exit 1
fi

# Vérifie si la variable SERVER_IP existe déjà dans le fichier .env
if grep -q "SERVER_IP=" "$env_file"; then
    # Remplace la valeur existante
    sed -i "s/^SERVER_IP=.*/SERVER_IP=$server_ip/" "$env_file"
else
    # Ajoute la variable SERVER_IP à la fin du fichier si elle n'existe pas
    echo "SERVER_IP=$server_ip" >> "$env_file"
fi

echo "Le fichier .env a été mis à jour avec l'adresse IP du serveur : $server_ip"


# Lancement du docker-compose
docker-compose up -d
