# SAE502 : Projet universitaire d'automatisation de tâches
## Contexte
L'objectif de ce projet est de sécuriser plusieurs instances web Apache en plusieurs containers : cela permet d'éviter de se retrouver avec plusieurs "VirtualHost" sur la même machine, cela peut poser des graves problèmes de sécurité surtout quand certains V.H sont écoutés sur Internet. Ici, chaque site-web aura son propre container. Le déploiement de ces containers se fera via Ansible en utilisant le module Docker et SSH Ansible. En plus de cela, une base de données MySQL et un visionneur de base (PhPMyAdmin) seront inclus dans le déploiement.
Comme il est prévu d'ajouter plusieurs sites-web, un main node manager sera installé dans un container afin de pouvoir ajouter un service web instantannément.

## Avancement
Liste succincte de ce qui a été fait :
 - Plannification IPv4
 - Templates Apache
 - Image Docker avec génération SSH unique à chaque container créé
 - Inventaire statique Ansible
 - Premières tâches Playbook : 
   - Création container du Proxy Inversé 
 - Gestion et contrôle des clefs privée et SSH
 - Test d'installation et configurations des containers de base
 - Création des roles afin d'éviter de réécrire certaines tâches.
 - Playbook PhPMyAdmin et MySQL OK
 - Template pour Proxy Inverse et sites-web

## A faire
Liste succincte de ce qui reste à faire :
 - Corriger problème push des dossiers vides (Merci VSCode)
 - Affiner le Playbook pour l'installation du serveur MySQL (demander un fichier SQL de base lors du premier démarrage)
 - Finaliser le plaubooks du Controll Manager pour créer le premier site-web
 - Conception du Main Node Manager (Playbook, Inventaire et site-web de management)
 - Réfléchir aux améliorations

Baptiste BORDENAVE
