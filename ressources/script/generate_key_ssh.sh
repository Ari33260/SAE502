#!/bin/bash
echo 'PermitRootLogin yes' >> /etc/ssh/sshd_config
mkdir /root/keys
ssh-keygen -t rsa -b 4096 -q -N '' -f -q'/root/keys/id_rsa'
sshpass –p 'rootdocker2024' ssh-copy-id -i /root/keys/id_rsa.pub -p 22 root@localhost
echo 'PasswordAuthentication no' >> /etc/ssh/sshd_config
service ssh restart
