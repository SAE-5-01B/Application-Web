#!/bin/bash

# Mise à jour des paquets
sudo apt-get update

# Suppression de toute installation précédente de Docker Engine et Docker Desktop
sudo apt-get remove docker docker-engine docker.io containerd runc
sudo apt-get purge docker-ce docker-ce-cli containerd.io docker-compose-plugin
sudo apt remove docker-desktop
rm -r $HOME/.docker/desktop
sudo rm /usr/local/bin/com.docker.cli
sudo apt purge docker-desktop -y

# Suppression des images, conteneurs, volumes et réseaux Docker
sudo docker system prune -a -f --volumes

# Suppression des fichiers résiduels de Docker Engine
sudo rm -rf /var/lib/docker
sudo rm -rf /var/lib/containerd

# Installation des dépendances nécessaires pour Docker Engine
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release

# Ajout du GPG officiel de Docker
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

# Ajout du repository Docker "stable" pour Docker Engine
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

# Mise à jour des paquets après l'ajout du repository Docker Engine
sudo apt-get update

# Installation de Docker Engine et Docker Compose
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin

# Vérification de l'installation de wget
if ! command -v wget &> /dev/null
then
    echo "Installation de wget..."
    sudo apt-get install wget -y
fi

# Téléchargement de Docker Desktop
wget https://desktop.docker.com/linux/main/amd64/docker-desktop-4.26.1-amd64.deb -O docker-desktop.deb

# Installation de Docker Desktop
sudo apt-get install ./docker-desktop.deb -y

# Nettoyage du fichier téléchargé
rm docker-desktop.deb

# Vérification de l'installation de Docker
sudo docker run hello-world
