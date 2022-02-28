CURRENT_PATH=$(pwd);

BASEDIR=$(dirname "$0")
BASEDIR=$(php -r "echo realpath('$BASEDIR');");
PROVISIONDIR="$BASEDIR/_provision";

INSTALL_PATH_DEFAULT=$(php -r "echo realpath('$CURRENT_PATH/..') . '/public';");
SITE_URL_DEFAULT=$(php -r "echo 'http://localhost' . str_replace('/var/www/html/', '/', '$INSTALL_PATH_DEFAULT');");

echo;
echo "========================================================";
echo "==================== INITIALISATION ====================";
echo "========================================================";
echo;
echo "🛠️ Loading functions";
. "$BASEDIR/_include/functions.sh"
. "$BASEDIR/_include/install-functions.sh"
echo "🛠️ Loading default configuration";
. "$BASEDIR/_include/install-configuration.default.sh"


# =======================================================================================================
# =======================================================================================================

# configuration checking
if [ -f "$BASEDIR/configuration.sh" ]; then
    echo;
    echo "========================================================";
    echo "== Configuration file found, loading configuration.sh ==";
    echo "========================================================";
    echo;
    echo "🛠️ Loading configuration";
    . "$BASEDIR/configuration.sh";
    echo;
fi

# =======================================================================================================


echo;
echo "========================================================";
echo "================ INSTALL CONFIGURATION =================";
echo "========================================================";
echo;


if [ -z $INSTALL_PATH ]; then
    INSTALL_PATH=$(ask "Installation folder" $INSTALL_PATH_DEFAULT)
fi
echo "✔️ Install path $INSTALL_PATH";
echo;


if [ -z $WORDPRESS_URL ]; then
    WORDPRESS_URL=$(ask "Site URL" $SITE_URL_DEFAULT)
fi
echo "✔️ Site URL : $WORDPRESS_URL";
echo;


if [ -z $MYSQL_USER ]; then
    MYSQL_USER=$(ask "Mysql user" $MYSQL_USER_DEFAULT)
fi
echo "✔️ Mysql user : " $MYSQL_USER;
echo

if [ -z $MYSQL_PASSWORD ]; then
    MYSQL_PASSWORD=$(ask "Mysql password" $MYSQL_PASSWORD_DEFAULT)
fi
echo "✔️ Mysql password : " $MYSQL_PASSWORD;
echo

if [ -z $MYSQL_HOST ]; then
    MYSQL_HOST=$(ask "Mysql host" $MYSQL_HOST_DEFAULT)
fi
echo "✔️ Mysql host : " $MYSQL_HOST;
echo


if [ -z $WORDPRESS_BDD ]; then
    WORDPRESS_BDD=$(ask "Mysql database" $WORDPRESS_BDD_DEFAULT)
fi
echo "✔️ Mysql database : " $WORDPRESS_BDD;
echo


if [ -z $WORDPRESS_TABLE_PREFIX ]; then
    WORDPRESS_TABLE_PREFIX=$(ask "Mysql table prefix" $WORDPRESS_TABLE_PREFIX_DEFAULT)
fi
echo "✔️ Mysql table prefix : " $WORDPRESS_TABLE_PREFIX;
echo


if [ -z $WORDPRESS_SITE_NAME ]; then
    WORDPRESS_SITE_NAME=$(ask "Site name" $WORDPRESS_SITE_NAME_DEFAULT)
fi
echo "✔️ Site name : " $WORDPRESS_SITE_NAME;
echo


if [ -z $WORDPRESS_ADMIN_NAME ]; then
    WORDPRESS_ADMIN_NAME=$(ask "Admin login" $WORDPRESS_ADMIN_NAME_DEFAULT)
fi
echo "✔️ Admin login : " $WORDPRESS_ADMIN_NAME;
echo

if [ -z $WORDPRESS_ADMIN_PASSWORD ]; then
    WORDPRESS_ADMIN_PASSWORD=$(ask "Admin password" $WORDPRESS_ADMIN_PASSWORD_DEFAULT)
fi
echo "✔️ Admin password : " $WORDPRESS_ADMIN_PASSWORD;
echo


if [ -z $WORDPRESS_ADMIN_EMAIL ]; then
    WORDPRESS_ADMIN_EMAIL=$(ask "Admin email" $WORDPRESS_ADMIN_EMAIL_DEFAULT)
fi
echo "✔️ Admin email : " $WORDPRESS_ADMIN_EMAIL;
echo


# =======================================================================================================

wpi_display_install_info;


if [ -z $SILENT]; then
    read -p "Continue ? [y]/n : " CONFIRM_INSTALL;
    if [ "$CONFIRM_INSTALL" = "n" ]; then
        echo "❌ Aborting installation";
        exit;
    else
        echo "✔️ Starting installation";
    fi
fi
echo;

echo;
echo "========================================================";
echo "================= STARTING INSTALL =====================";
echo "========================================================";
echo;



wpi_test_parent_url $WORDPRESS_URL;
wpi_handle_createfolder;
wpi_test_url $WORDPRESS_URL;


wpi_bdd_setup;
wpi_handle_wpcli;


wpi_handle_gitignore;

wpi_handle_composer;

wpi_handle_index;
wpi_handle_wpconfig;
wpi_wp_cli_config;



wpi_handle_wpinstall;
wpi_handle_postinstall;


echo "👌 Install successfull.";
echo "      🏠 Front URL : $WORDPRESS_URL";
echo "      ⚙️ Back URL : $WORDPRESS_URL/$WORDPRESS_FOLDER/wp-admin";


cd $CURRENT_PATH;