FROM nginx:stable

ADD ./.docker/nginx/development/default.conf /etc/nginx/conf.d/default.conf
ADD ./public /var/www/public

WORKDIR /var/www/public
