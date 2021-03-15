FROM ubuntu:latest

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
# RUN sed -i -e "s/\/\/archive\.ubuntu.com/\/\/192.168.0.111/" /etc/apt/sources.list
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get -y upgrade && apt-get install --assume-yes apt-utils
RUN apt-get -y install apache2 php php-mysqli libapache2-mod-php curl lynx vim git wget aptitude zip lftp
RUN apt-get install -y php-mysqlnd php-pdo php-mbstring php-zip php-bz2 php-gd
#RUN apt-get install -y php-mcrypt
RUN apt-get install -y php-pear php-dev php-curl php-xmlrpc php-xsl php-ssh2 php-bcmath php-imap
RUN apt-get install -y glances atop
#required for image magick
RUN apt-get install -y build-essential
RUN apt-get install -y autoconf automake autopoint chrpath cm-super-minimal debhelper dh-autoreconf  dh-strip-nondeterminism doxygen doxygen-latex gir1.2-rsvg-2.0 graphviz
RUN apt-get install -y libbz2-dev libcairo-script-interpreter2 libcairo2-dev libcdt5 libcgraph6  libdjvulibre-dev libexif-dev libfftw3-bin libfftw3-dev
RUN apt-get install -y libfftw3-long3 libfftw3-quad3 libfile-stripnondeterminism-perl libfontconfig1-dev libfreetype6-dev libgdk-pixbuf2.0-dev libglib2.0-dev libgvc6 libgvpr2
RUN apt-get install -y libharfbuzz-dev libharfbuzz-gobject0 libice-dev libilmbase-dev  libjbig-dev libjpeg-dev libjpeg-turbo8-dev libjpeg8-dev libjs-jquery liblcms2-dev
RUN apt-get install -y  liblqr-1-0-dev   liblzma-dev libobjc-8-dev libobjc4 libopenexr-dev libpango1.0-dev  libpathplan4 libpcre3-dev libpcre32-3 libpcrecpp0v5 libperl-dev
RUN apt-get install -y libpixman-1-dev  libpotrace0 libptexenc1 libpthread-stubs0-dev   librsvg2-bin librsvg2-dev libsigsegv2 libsm-dev libsynctex-dev
RUN apt-get install -y libtexluajit2 libtiff5-dev libtiffxx5 libwmf-dev libx11-dev libxau-dev   libxcb-render0-dev libxcb-shm0-dev libxcb1-dev libxdmcp-dev libxext-dev   libxft-dev
RUN apt-get install -y libxml2-dev libxml2-utils libxrender-dev libxt-dev libzzip-0-13   m4 pkg-kde-tools po-debconf preview-latex-style tex-common texlive-base   texlive-binaries
RUN apt-get install -y texlive-extra-utils texlive-font-utils   texlive-fonts-recommended texlive-latex-base texlive-latex-extra  texlive-latex-recommended texlive-pictures x11proto-core-dev
RUN apt-get install -y x11proto-input-dev x11proto-kb-dev x11proto-render-dev x11proto-xext-dev   xorg-sgml-doctools xsltproc xtrans-dev zlib1g-dev libtiff5-dev  xorg-dev libopenjp2-7-dev
#this will download latest version of imageMagick and compile it
RUN wget http://www.imagemagick.org/download/ImageMagick.tar.gz && tar -xzf ImageMagick.tar.gz && cd ImageMagick* && ./configure && make -j8 && make install && ldconfig /usr/local/lib
RUN apt-get install -y libvips libvips-dev
# next line is disabled because more recent version is available using pecl
# apt-get install -y php5-xdebug
RUN apt-get install -y smbclient samba-common cifs-utils expect expect-dev php-imagick iputils-ping
RUN apt-get install -y nmon htop mc iotop net-tools nano openssh-server mysql-client iftop
RUN apt-get install -y memcached php-memcache
RUN apt-get install -y libmemcached11 libmemcachedutil2 libmemcached-dev libz-dev
RUN apt install -y mongodb
RUN apt install -y php-tidy
RUN apt install -y composer
RUN apt install -y phantomjs firefox libappindicator1 fonts-liberation
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb && dpkg -i --force-depends google-chrome-stable_current_amd64.deb && apt-get install -f -y
RUN apt-get install -y pkg-config

RUN apt-get install nodejs -yq

#all pecl extensions has to be manually added into ini
RUN yes | pecl install xdebug
RUN yes | pecl install mongodb
RUN yes | pecl install vips
RUN pecl install -o -f memcached
RUN pecl install -o -f redis
# Enable apache mods.
RUN a2enmod php7.4
RUN a2enmod rewrite
RUN a2enmod headers
# without next line it will look all urls with /javascript/ to wrong path
RUN a2disconf javascript-common
RUN sed -i '/short_open_tag/d' /etc/php/7.4/apache2/php.ini
RUN sed -i '/short_open_tag/d' /etc/php/7.4/cli/php.ini
ADD Docker-mihajlo.ini /etc/php/7.4/mods-available/mihajlo.ini
ADD Docker-xdebug.ini /etc/php/7.4/mods-available/xdebug.ini
ADD Docker-mongodb.ini /etc/php/7.4/mods-available/mongodb.ini
ADD Docker-vips.ini /etc/php/7.4/mods-available/vips.ini
ADD Docker-redis.ini /etc/php/7.4/mods-available/redis.ini
ADD Docker-memcached.ini /etc/php/7.4/mods-available/memcached.ini
RUN mkdir /etc/apache2/ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=local.racuni.com" -keyout /etc/apache2/ssl/apache.key -out /etc/apache2/ssl/apache.crt
RUN a2enmod ssl
RUN a2enmod expires
RUN echo "zend_extension=$(find /usr/lib/php/ -name xdebug.so)" >> /etc/php/7.4/mods-available/xdebug.ini
RUN echo "extension=$(find /usr/lib/php/ -name memcached.so)" >> /etc/php/7.4/mods-available/memcached.ini
RUN echo "extension=$(find /usr/lib/php/ -name redis.so)" >> /etc/php/7.4/mods-available/redis.ini

RUN phpenmod -v ALL mihajlo
RUN phpenmod -v ALL xdebug
RUN phpenmod -v ALL tidy
RUN phpenmod -v ALL mongodb
RUN phpenmod -v ALL vips
RUN phpenmod -v ALL redis
RUN phpenmod -v ALL memcached

# ovo nam ne treba za sad, al nek ostane komentovano
#RUN npm set progress=false && npm config set depth 0
#RUN npm i puppeteer


# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose apache.
#EXPOSE 80
#EXPOSE 22
EXPOSE 443
EXPOSE 9000
ADD Docker-apache.conf /etc/apache2/sites-enabled/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND
