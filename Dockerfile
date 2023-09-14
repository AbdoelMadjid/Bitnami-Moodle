FROM docker.io/bitnami/moodle:4.0.9

EXPOSE 8080
EXPOSE 80
EXPOSE 443

ENV APACHE_HTTP_PORT_NUMBER=80
ENV APACHE_HTTPS_PORT_NUMBER=443

COPY ./moodle /bitnami/moodle
COPY ./moodledata /bitnami/moodledata

RUN chmod -R 777 /bitnami/moodle /bitnami/moodledata