# ZF2Skeleton
<a href="https://drive.google.com/uc?export=view&id=0B9ORDq2h_FjhOE4xbl9OcGItV2c"><img src="https://drive.google.com/uc?export=view&id=0B9ORDq2h_FjhOE4xbl9OcGItV2c" style="width: 500px; max-width: 100%; height: auto" title="Click for the larger version." /></a>

Repository is a Zend Framework 2 configured application which includes
  
  * Assets management with [bower](http://bower.io/) and [less](http://lesscss.org/)
  * [Twitter Bootstrap 3](http://getbootstrap.com/)
  * DB migrations support with [liquibase](http://www.liquibase.org/)
  * PostgreSQL object model manager [pomm](http://www.pomm-project.org/)
  * Zend Framework 2
    *  different environments support
    * bootstraping through Bootstrap.php
    * configs caching
    * modules configs autoloading
    * [zend developer toolbar](https://github.com/zendframework/ZendDeveloperTools)
    * pomm profiler
    * example of layouts and commands usage
    * postresql visual presentation in [pgModeler](http://pgmodeler.com.br/)
  * GIT pre-commit hook   

## Installation
Apache virtual host configuration
```
<VirtualHost *:80>
    ServerName zf2.local
    DocumentRoot /var/www/zf2/public
    SetEnv APPLICATION_ENV "development"
    <Directory /var/www/zf2/public>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```
PostgreSQL Database
```
CREATE DATABASE zf2skeleton;
CREATE USER zf2skeleton WITH password 'zf2skeleton';
GRANT ALL privileges ON DATABASE zf2skeleton TO zf2skeleton;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO zf2skeleton;
```
Run migrations
```
$ bin/db_update.sh
```

Install composer globally

```
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
```

Install required php packages

```
$ composer install
```

Install bower and js dependencies

```
$ sudo npm update npm
$ sudo npm config set registry http://registry.npmjs.org/
$ sudo npm cache clean
$ sudo npm install -g bower
$ bower install
```
Run application provisioning
```
$ php public/index.php app-provisioning
```

## Additional Commands
Generate css from less
```
lessc --include-path="public/css/_source/:public/vendor/bootstrap/less/" public/css/_source/application.less public/css/application.css
```
Generate pomm models/entities
```
for i in page ; do php vendor/bin/pomm.php pomm:generate:relation-all -b BootstrapPomm.php -d module/Core/src/ -a "Core\Pomm" zf2skeleton $i public; done
```
