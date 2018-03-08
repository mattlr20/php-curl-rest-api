# php-curl-rest-api
Simple PHP API using cURL. Configured to work with IIS.

# Setup
- Make sure curl extension is enabled in your php.ini
- In index.php, change $url to desired url
- The web.config file is for URL Rewrite. If you do not wish to use web.config, make sure you change $url parameter to '?name=', or use a .htaaccess file.
