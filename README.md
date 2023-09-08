# Moodle-Docker
A step-by-step guide by Josh @purylte

1. Dump the Moodle database to `moodle-database.sql`.
2. Place the Moodle folder into `./moodle`.
3. Place the Moodle data folder into `./moodledata`, excluding the following folders: `cache`, `lock`, `temp`, `trashdir`, `sessions`, `localcache`, `muc`.
4. Ensure that `config.php` is configured correctly.
5. Run `docker-compose up -d` with the `-d` flag for detached mode.
6. If the Moodle container fails to start, try starting the container again. On the first run, MySQL might not have finished setting up, but Moodle attempts to connect, resulting in a failure.
7. Use `docker-compose stop` to shut down the containers.

Happy Coding!🎉
