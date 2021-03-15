# Docker quick start:

## linux 
- apt install docker docker.io docker-compose
- apt install composer
- apt install curl php7.0-curl
- make new folder public_html/tmp
- download from live .htpasswds
- pvsr admin section (our_records) requires following databases:pvsr,psr,bsr,rmft
- composer update

## windows
- Install docker-toolbox (virtualbox and git are required only if not already installed)
- Start "Docker quickstart terminal" (it should start "default" virtualbox and setup everything)
- When dockerfile apt-get lines are changed it is required to remove all images and containers check how to do it on the bottom
- In phpstorm settings under "bild, execution, deployment" click docker and green plus icon to add new docker, it should automatically detect docker and show it as "running"
- In phpstorm toolbar dropdown click edit configurations, click green plus icon and add docker/docker-compose, name it somehow and select already created docker server 

### Stop all containers
`docker stop $(docker ps -aq)`
### Delete all containers
`docker rm $(docker ps -a -q)`
### Delete all images
`docker rmi $(docker images -q)`

### Rebuilding docker from scratch
This should be done if some new packages are added and some report as broken (404 not found). 
This means that remote repo is newer and apt database cached in local container is old. This line should fix the issue.
However, it might remove images required for other containers which means all containers might need to be rebuilt.

`docker-compose down && docker-compose build --no-cache && docker-compose up`


### Local dns (reverse proxy) and ssl:
To be able to access local environment by using domain (and use multiple images at t the same time),
nginix proxy has to be added. Docker composer is already reconfigured to use that feature, however before running
the instance for the first time it is required to execute following command only once: 
`docker network create nginx-proxy`, this will create a bridge network for docker containers which can also allow multiple sites to work at the same time.
IMPORTANT NOTE: <b>local hosts file has to be updated as well</b>

Change 2017-02-11: Docker compose file separated into two docker containers main is docker_context and new reverse-proxy will be used used to combine multiple
websites so locally all can be accessed. There will be new git distro for reverse-proxy and documentation how to set it will be there.

### Mysql setup

- Install mariadb locally, (for win users) add bin folder of mysql to system path so commands can work out of the box.

- Set root password to "az" or something else, in examples here "az" will be considered as password

- for win users: allow root from remote: `GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'az';` followed by `FLUSH PRIVILEGES;`
for linux users this is not required since mysql remains on the same machine as the website. 

### Export/import live database: 
It is required about 11GB of disk space for download, use following command to export:
`mysqldump -h [ip address] -u [username]  --password="[password]" --single-transaction --quick --compress --add-locks --databases "[dbname]" >dump.sql`
it needs about 20 minutes for export, depending on which db is selected

Use following command to import into your local db: `mysql -u root -paz < dump.sql`, time for import depends on local hardware and disk speed, it might take up to 1-3 hours 

It might be a problem to edit local stored procedures and triggers since "definer" is imported as well, 
best way is to edit files located in .mysql_queries/stored_procedures and for triggers to recreate them locally without definer

It is important not to use same method for sending db changes to live (dump export/import), but to recreate code manually on live db directly by using pvsr user  
 
 
#Web Server, Composer and phpFastCache
Since default version of php is 5.4, phpfastcache works only with version 5.6 or later. It is not possible to install it on main domains.
For dev.privateschoolreview.com I've set multiPHP cpanel version to 7.0, it is very easy to switch between versions. I was able to install phpFastcache to dev
using following command:

`ea-php70 -d allow_url_fopen=on /usr/local/bin/composer install`

EasyApache4 also works, if any additional extensions are required to be installed for specific php version it should be done there, however
there are some extensions that can be installed only over pecl. That has to be done via WHM. For every php version there is a separate cpanel extensions list.
Memcache is available only as pecl up to version 5.6, and Memcached is available only for 5.6 and later which means we cant use memcache directly, however we can use
phpFastCache as a wrapper and switch driver depending on version installed.

For some reason, every time I push/deploy something, phpinfo() would show wrong (old) version of php.
To fix this I've added this line to .htaccess

`AddType application/x-httpd-ea-php70 php`