FROM debian

RUN apt update && \
    apt upgrade -y && \
    apt-get install -y apache2 php libapache2-mod-php iputils-* openssh-server git -y && \
    echo "PasswordAuthentication no" >> /etc/ssh/sshd_config && \
    service ssh start && \
    service apache2 start

RUN mkdir /var/www/website
