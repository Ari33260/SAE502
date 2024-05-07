#!/bin/bash

if [ "$#" -lt 2 ]; then
    echo "Usage: $0 add|del arg1 arg2 ... argN"
    exit 1
fi

command=$1
shift

if [ "$command" == "add" ]; then
    GIT=$1
    FQDN=$2
    ACL=$3
    echo "GIT link : $GIT"
    echo "FQDN : $FQDN"
    echo "ACL : $ACL"
    ansible-playbook -b -i inventories/inventaire.ini playbooks/addWebsite.yaml --extra-vars '{"GIT":"'"$GIT"'","ACL":"'"$ACL"'","FQDN":"'"$FQDN"'"}'
elif [ "$command" == "del" ]; then
    FQDN=$1
    echo "FQDN : $FQDN"
    ansible-playbook -b -i inventories/inventaire.ini playbooks/delWebsite.yaml --extra-vars '{"FQDN":"'"$FQDN"'"}'
else
    echo "Commande inconnue: $command"
    exit 1
fi
