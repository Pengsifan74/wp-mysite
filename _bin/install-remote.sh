CURRENT_PATH=$(pwd);
BASEDIR=$(dirname "$0")
BASEDIR=$(php -r "echo realpath('$BASEDIR');");

INSTALL_SCRIPT_FOLDER="_bin";

INSTALL_CONFIGURATION_FILE="install-configuration.tmp"



echo;
echo "========================================================";
echo "==================== INITIALISATION ====================";
echo "========================================================";
echo;
echo "🛠️ Loading functions";
. "$BASEDIR/_include/functions.sh"

echo "🛠️ Loading configuration";
. "$BASEDIR/config.sh"


generateProductionConfigurationFile()
{
    echo 'INSTALL_PATH="'$PRODUCTION_PUBLIC_PATH'"' >> $INSTALL_CONFIGURATION_FILE;
    echo 'MYSQL_USER="'$PRODUCTION_MYSQL_USER'"' >> $INSTALL_CONFIGURATION_FILE;
    echo 'MYSQL_PASSWORD="'$PRODUCTION_MYSQL_PASSWORD'"' >> $INSTALL_CONFIGURATION_FILE;
    echo 'MYSQL_HOST="'$PRODUCTION_MYSQL_HOST'"' >> $INSTALL_CONFIGURATION_FILE;
    echo 'WORDPRESS_BDD="'$PRODUCTION_MYSQL_DATABASE'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_TABLE_PREFIX="'$PRODUCTION_MYSQL_TABLE_PREFIX'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_URL="'$PRODUCTION_WORDPRESS_URL'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_SITE_NAME="'$WORDPRESS_SITE_NAME'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_ADMIN_NAME="'$WORDPRESS_ADMIN_NAME'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_ADMIN_PASSWORD="'$WORDPRESS_ADMIN_PASSWORD'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'WORDPRESS_ADMIN_EMAIL="'$WORDPRESS_ADMIN_EMAIL'"' >> $INSTALL_CONFIGURATION_FILE
    echo 'SILENT="1"' >> $INSTALL_CONFIGURATION_FILE
}


if [ -f $INSTALL_CONFIGURATION_FILE ]; then
    rm $INSTALL_CONFIGURATION_FILE
fi


echo "🛠️ Generating install configuration file";

generateProductionConfigurationFile;




echo "🛠️ Removing production folder $PRODUCTION_PATH";
ssh_exec "sudo rm -rf $PRODUCTION_PATH";

echo "🛠️ Cloning project into $PRODUCTION_PATH";
ssh_exec "git clone $GIT_URL $PRODUCTION_PATH";

scp -i $SSH_KEY $BASEDIR/$INSTALL_CONFIGURATION_FILE $PRODUCTION_USER@$PRODUCTION_SERVER":$PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER/configuration.sh"

scp -r -i $SSH_KEY $BASEDIR/* $PRODUCTION_USER@$PRODUCTION_SERVER":$PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER"

# scp -i $SSH_KEY $BASEDIR/install.sh $PRODUCTION_USER@$PRODUCTION_SERVER":$PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER/install.sh"
# scp -r -i $SSH_KEY $BASEDIR/_include $PRODUCTION_USER@$PRODUCTION_SERVER":$PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER"
# scp -r -i $SSH_KEY $BASEDIR/_provision $PRODUCTION_USER@$PRODUCTION_SERVER":$PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER"


echo "🛠️ Launch wordpress installation into $PRODUCTION_PATH";
ssh_exec "cd $PRODUCTION_PATH/$INSTALL_SCRIPT_FOLDER && sh install.sh"


exit 0;
