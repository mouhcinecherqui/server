# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: mocherqu <mocherqu@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/12/29 16:07:14 by mocherqu          #+#    #+#              #
#    Updated: 2020/01/19 18:27:59 by mocherqu         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian:buster
RUN apt-get update && apt-get upgrade -y && apt install tar 
RUN apt-get install -y nginx
RUN apt-get install -y openssl
RUN apt-get install -y mariadb-server
RUN apt-get install -y php-mysql
RUN apt-get install -y php-mbstring php-zip php-gd php-xml php-pear php-gettext php-cgi
RUN apt-get install -y php7.3 php7.3-common php7.3-opcache php7.3-cli php7.3-gd php7.3-curl php7.3-mysql
RUN apt-get install -y php-fpm
RUN apt-get install -y wget
RUN apt-get install -y vim
RUN apt-get install -y procps
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-english.tar.gz
RUN tar xzf phpMyAdmin-4.9.0.1-english.tar.gz
COPY srcs/config.inc.php /phpMyAdmin-4.9.0.1-english
RUN mv phpMyAdmin-4.9.0.1-english/ /usr/share/phpmyadmin
RUN ln -s /usr/share/phpmyadmin /var/www/html
RUN mkdir -p /var/lib/phpmyadmin/tmp && chmod 766 /var/lib/phpmyadmin/tmp
COPY srcs/wordpress /var/www/html/wordpress
COPY srcs/wp-config.php /var/www/html/wordpress
RUN chown -R www-data:www-data /var/www/html/wordpress
COPY srcs/default /etc/nginx/sites-available/
COPY srcs/certificate.sh /root
RUN chmod +x /root/certificate.sh
RUN /root/certificate.sh
COPY srcs/start.sh .
RUN chmod +x start.sh
CMD ./start.sh
