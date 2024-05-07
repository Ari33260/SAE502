#!/bin/bash

if [ "$#" -lt 2 ]; then
    echo "Usage: $0 add|del arg1 arg2 ... argN"
    exit 1
fi

command=$1
shift

if [ "$command" == "add" ]; then
    GIT=$2
    FQDN=$3
    ACL=$4
    ansible-playbook -b -i inventories/inventaire.ini playbooks/addWebsite.yaml --extra-vars '{"GIT":"'"$GIT"'","ACL":"'"$ACL"'","FQDN":"'"$FQDN"'"}'
elif [ "$command" == "del" ]; then
    FQDN=$2
    ansible-playbook -b -i inventories/inventaire.ini playbooks/delWebsite.yaml --extra-vars '{"FQDN":"'"$FQDN"'"}'
else
    echo "Commande inconnue: $command"
    exit 1
fi
