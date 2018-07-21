# api_sample
REST API sample application using domain model architecture   

This API is built in domain model architecture, it's just a sample to get a random records from database 

Consider that we have a DB table that has some transactions called transactions  

with attributes (ID, lat, long)  

- DB config can be changed from the config/config.php

- composer install and run the built in php server using  

```
composer install  
php -S localhost:8080 -t public public/index.php
``` 

URL should be ​ http://localhost:8080/api​ (GET)
