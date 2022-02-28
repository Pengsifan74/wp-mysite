USER_NAME=$USER


# BDD_USER_NAME="explorateur"
# BDD_USER_PASSWORD="explorateur"
# BDD_REMOTE_HOST="remote_host"


read -p "BDD User name ? " BDD_USER_NAME
echo $BDD_USER_NAME;


read -p "BDD password ? " BDD_USER_PASSWORD
echo $BDD_USER_PASSWORD


read -p "BDD host ? " BDD_REMOTE_HOST
echo $BDD_REMOTE_HOST


#apt-get install sudo
#/usr/sbin/usermod -aG sudo $USER
installEssentials()
{
    #mise à jour de la base logicielle===============
    sudo apt-get update
    #mise à jour des logiciels préinstallés===========
    sudo apt-get -y upgrade
    #installation de vim (est généralement préinstallé)==
    sudo apt-get install -y vim


    # Divers outils utiles pour dev ; notemment gcc
    sudo apt-get install -y build-essential

    #installation de wget (est généralement préinstallé)==
    sudo apt-get install -y wget
    #curl
    sudo apt-get install -y curl
    #installation zip ; au cas-où
    sudo apt-get install -y unzip
    #imagemagick
    sudo apt-get install -y imagemagick

    #emoji font
    sudo apt-get install -y fonts-noto-color-emoji


    sudo apt-get install -y libxml2-dev zlib1g-dev

    # Souvenir wonderland !
    sudo apt-get -y cowsay
}

reinitMySQL()
{
    sudo mysql_install_db --user=mysql
}

installApache()
{
    #installation apache==============================
    sudo apt-get install -y apache2
    #activation du mod rewrite pour les htaccess=======
    sudo a2enmod rewrite
    sudo service apache2 restart
}

configureApache()
{
    #configuration apache=========================
    #sudo vim /etc/apache2/apache2.conf
    #sudo nano /etc/apache2/apache2.conf
    #<Directory /var/www/>
    #	Options Indexes FollowSymLinks
    #	AllowOverride All
    #	Require all granted
    #</Directory>
    #sudo service apache2 restart
    sudo php -r "file_put_contents('/etc/apache2/apache2.conf', str_replace('AllowOverride None', 'AllowOverride All', file_get_contents('/etc/apache2/apache2.conf')));"
    #configuration des droits=====================
    #remplacer ubuntu par le votre nom d'utilisateur

    sudo chown -R $USER_NAME:www-data /var/www/html
    sudo chmod -R 775 /var/www/html
    sudo chmod g+s /var/www/html


    sudo rm -rf /var/www/html/index.html
    sudo service apache2 restart
    #enable vhostalias ; doc : https://httpd.apache.org/docs/2.2/vhosts/mass.html
    #sudo a2enmod vhost_alias
    #echo 'UseCanonicalName  off' | sudo tee -a /etc/apache2/sites-enabled/000-default.conf
    #echo 'VirtulDocumentRoot /var/www/html/%2+/%1/www' | sudo tee -a /etc/apache2/sites-enabled/000-default.conf
    #sudo service apache2 restart


}
installPHP()
{
    #installation php========================
    sudo apt-get install -y php
    sudo apt-get install -y php-zip
    sudo apt-get install -y php-gd
    sudo apt-get install -y php-xml
    sudo apt-get install -y php-simplexml
    sudo apt-get install -y php-sqlite3
    sudo apt-get install -y php-mbstring
    sudo apt-get install -y php-mysql
    sudo apt-get install -y php-pdo
    sudo apt-get install -y php-xdebug
    sudo apt-get install -y php-intl
    sudo apt-get install -y php-curl
    sudo apt-get install -y php-imagick
    sudo service apache2 restart
}

installPHP74()
{
    # sudo apt-get purge php7.*
    sudo service apache2 stop
    sudo apt update
    sudo apt upgrade -y
    # sudo reboot
    sudo apt -y install lsb-release apt-transport-https ca-certificates
    sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
    sudo apt update

    # sudo apt-get install -y php7.4 php7.4-bcmath php7.4-bz2 php7.4-intl php7.4-gd php7.4-mbstring php7.4-mysql php7.4-zip php7.4-simplexml php7.4-sqlite3 php7.4-pdo php7.4-xdebug php7.4-curl php7.4-imagick php7.4-xml

    sudo apt-get install -y php7.4
    sudo apt-get install -y php7.4-bcmath
    sudo apt-get install -y php7.4-bz2
    sudo apt-get install -y php7.4-intl
    sudo apt-get install -y php7.4-gd
    sudo apt-get install -y php7.4-mbstring
    sudo apt-get install -y php7.4-mysql
    sudo apt-get install -y php7.4-zip
    sudo apt-get install -y php7.4-simplexml
    sudo apt-get install -y php7.4-sqlite3
    sudo apt-get install -y php7.4-pdo
    sudo apt-get install -y php7.4-xdebug
    sudo apt-get install -y php7.4-curl
    sudo apt-get install -y php7.4-imagick
    sudo apt-get install -y php7.4-xml
    sudo apt-get install -y php7.4-xml

    sudo service apache2 start
}



installPHPTools()
{
    #composer===================================================
    #attention c'est une installation bourrine de composer...
    cd /tmp
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --quiet
    sudo mv composer.phar /usr/local/bin/composer
    #installatin phpcs=========================================
    wget -O phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
    sudo chmod a+x phpcs.phar
    sudo mv phpcs.phar /usr/local/bin/phpcs.phar
    #installatin cs-fixer=========================================
    cd /tmp
    wget https://cs.symfony.com/download/php-cs-fixer-v2.phar -O php-cs-fixer
    sudo chmod a+x php-cs-fixer
    sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer
    #installation adminer
    mkdir /var/www/html/adminer


    wget https://github.com/vrana/adminer/releases/download/v4.8.0/adminer-4.8.0.php
    mv adminer-4.8.0.php /var/www/html/adminer/index.php
    #création d'un fichier phpinfo pour vérifier la configuration=========
    sudo echo "<?php phpinfo(); " > /var/www/html/phpinfo.php
}
configurePHP()
{
    sudo php -r "\$ini=glob('/etc/php/*/apache2/php.ini')[0]; \$buffer=file_get_contents(\$ini); \$buffer=str_replace('display_errors = Off', 'display_errors = On',\$buffer); file_put_contents(\$ini, \$buffer);";
    sudo service apache2 restart
}

configurePHP74()
{
    sudo php -r "\$ini=glob('/etc/php7.4/*/apache2/php.ini')[0]; \$buffer=file_get_contents(\$ini); \$buffer=str_replace('display_errors = Off', 'display_errors = On',\$buffer); file_put_contents(\$ini, \$buffer);";
    sudo service apache2 restart
}


installMySQL()
{
    #installation mariadb-server============
    sudo apt-get install -y mariadb-server
    sudo service mariadb start
}
configureMysql()
{
    #configuration mysql=====================
    sudo mysql -e"CREATE USER '$BDD_USER_NAME'@'localhost' IDENTIFIED BY '$BDD_USER_PASSWORD';" mysql
    sudo mysql -e"GRANT ALL PRIVILEGES ON *.* TO '$BDD_USER_NAME'@'localhost';" mysql
    #sudo mysql -e"CREATE USER '$BDD_USER_NAME'@'%' IDENTIFIED BY '$BDD_USER_PASSWORD';" mysql
    #sudo mysql -e"GRANT ALL PRIVILEGES ON *.* TO '$BDD_USER_NAME'@'%';" mysql


    #sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf

    sudo service mariadb restart
}

installGit()
{
    #installation de git ; mais généralement est préinstallé===========
    sudo apt-get install -y git
    git config --global user.email "$USER_NAME@localhost"
    git config --global user.name "$USER_NAME"
}


installWPCli()
{
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp
}

installPHPDeployer()
{
    curl -LO https://deployer.org/deployer.phar
    sudo mv deployer.phar /usr/local/bin/dep
    sudo chmod +x /usr/local/bin/dep
}

installSymfonyTools()
{
    curl -sS https://get.symfony.com/cli/installer | bash
    sudo mv ~/.symfony/bin/symfony /usr/local/bin/symfony
}


#==========================================================================================
#==========================================================================================
installEssentials
installApache

IS_DEBIAN=$(cat /etc/os-release | grep -e '^NAME="Debian');

if [ -z "$IS_DEBIAN" ]; then
    echo "Not Debian distribution";
    installPHP
else
    echo "Debian distribution detected";
    installPHP74
fi




installMySQL


configureApache

if [ -z "$IS_DEBIAN" ]; then
    echo "Not Debian distribution";
    configurePHP
else
    echo "Debian distribution detected";
    configurePHP74
fi


configureMysql
installPHPTools
configureProfile
installGit




#installJSStack
#sudo apt-get install -y debconf
#sudo /usr/sbin/dpkg-reconfigure locales
#apt-get install xfce4
#sudo apt-get install -y openssh-server
#dpkg-reconfigure locales
exit 0