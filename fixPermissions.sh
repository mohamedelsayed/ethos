find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod +x fixPermissions.sh 
mkdir -p app/tmp/pdf
mkdir -p app/webroot/img/upload
mkdir -p app/webroot/files/upload
mkdir -p app/webroot/files/admissions
chmod -R 777 app/tmp
chmod -R 777 app/tmp/pdf
chmod -R 777 app/webroot/img/upload
chmod -R 777 app/webroot/files/upload
chmod -R 777 app/webroot/files/admissions
chmod 777 app/webroot/css/backend/admissions_pdf.css