find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod -R 777 app/tmp
chmod -R 777 app/webroot/img/upload
chmod -R 777 app/webroot/files/upload

