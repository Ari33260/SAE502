#!/bin/bash
service ssh start
sleep 5
echo 'PermitRootLogin yes' >> /etc/ssh/sshd_config
ssh-keygen -t rsa -b 4096 -q -N '' -f '/root/keys/id_rsa'
cp root/keys/id_rsa root/keys/id_rsa.pub root/.ssh/
touch /root/.ssh/authorized_keys
cat root/keys/id_rsa.pub >> /root/.ssh/authorized_keys
chmod 600 /root/.ssh/authorized_keys
chmod 700 /root/.ssh
chmod 666 /root/keys/id_rsa
echo 'PasswordAuthentication no' >> /etc/ssh/sshd_config
service ssh restart
