FROM debian:latest

RUN apt update && apt install  openssh-server sshpass sudo python3 -y

RUN echo 'root:rootdocker2024' | chpasswd

COPY generate_key_ssh.sh /root/start.sh

RUN chmod +x /root/start.sh

EXPOSE 22

CMD ["/usr/sbin/sshd","-D"]
ENTRYPOINT ["/root/start.sh"]
CMD ["/bin/bash"]
