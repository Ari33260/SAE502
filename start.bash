#!/bin/bash

# Exécution de la commande ansible-playbook
ansible-playbook -b -i inventories/inventaire.ini playbooks/initialisation.yaml
