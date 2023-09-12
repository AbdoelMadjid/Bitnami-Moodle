FROM docker.io/bitnami/moodle:4.0.9

EXPOSE 8080

COPY ./moodle /bitnami/moodle
COPY ./moodledata /bitnami/moodledata
# COPY ./www.conf /opt/bitnami/php/etc/php-fpm.d/www.conf

RUN chmod -R 777 /bitnami/moodle /bitnami/moodledata