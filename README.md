# Moodle-Docker
Step by step guide from Josh @purylte 

1. Dump moodle database ke `moodle-database.sql`.
2. Masukan folder moodle ke `./moodle`.
3. Masukan folder moodledata ke `./moodledata`. Kecuali folder `cache` `lock` `temp` `trashdir` `sessions` `localcache` `muc`.
4. Pastikan `config.php` sesuai.
5. `docker compose up -d` -d for detached mode
6. Jika container moodle gagal, coba start lagi container tersebut. Pada pertama kali dijalankan, kemungkinan besar mysql belum selesai disetup tetapi moodle sudah mencoba konek sehingga gagal. 
7. `docker compose stop` untuk mematikan.
