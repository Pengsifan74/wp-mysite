
# ====================================================================
# CHANGE THIS Remote configuration ===================================

# PRODUCTION_SERVER="ec2-54-173-17-119.compute-1.amazonaws.com";
# PRODUCTION_USER="ubuntu";

SSH_KEY="~/.ssh/aws-wonderland.pem";
PRODUCTION_SERVER="ec2-54-172-244-11.compute-1.amazonaws.com";
PRODUCTION_USER="ubuntu";

GIT_URL="git@github.com:O-clock-Wonderland/wp-oprofile";

# ====================================================================
# CHANGE THIS Production Wordpress configuration =====================

# name of the project install folder ; do not include the document root path it will be handled automaticaly
PRODUCTION_WORDPRESS_FOLDER="oprofile";

WORDPRESS_SITE_NAME="oprofile";
WORDPRESS_ADMIN_NAME="admin";
WORDPRESS_ADMIN_PASSWORD="admin";
WORDPRESS_ADMIN_EMAIL="admin@mail.com";

# mysql configuration
PRODUCTION_MYSQL_USER="explorateur";
PRODUCTION_MYSQL_PASSWORD="Ereul9Aeng";
PRODUCTION_MYSQL_HOST="localhost";
PRODUCTION_MYSQL_DATABASE="oprofile";
PRODUCTION_MYSQL_TABLE_PREFIX="wdl_";

# ====================================================================
# CHANGE THIS LOCAL Wordpress configuration ==========================

# name of the project install folder
LOCAL_WORDPRESS_FOLDER="spe-wp/oprofile";

LOCAL_MYSQL_USER="explorateur";
LOCAL_MYSQL_PASSWORD="Ereul9Aeng";
LOCAL_MYSQL_HOST="localhost";
LOCAL_MYSQL_DATABASE="wdl_oprofile";

TABLE_PREFIX="op_";

# =====================================================================================================
# =====================================================================================================


# ===================================================================
# Default configuration ;  should not be modified ===================

DEFAULT_HTTP_PROTOCOL='http';
DEFAULT_DOCUMENT_ROOT="/var/www/html";

DEFAULT_PUBLIC_FOLDER='public';
DEFAULT_UPLOAD_FOLDER="$DEFAULT_PUBLIC_FOLDER/content/uploads";
DEFAULT_LOCAL_HOST='localhost';

DEFAULT_APACHE_USER="www-data";

# ====================================================================
# Production computed configuration; should not be modified ==========

PRODUCTION_DOCUMENT_ROOT=$DEFAULT_DOCUMENT_ROOT;
PRODUCTION_PATH=$PRODUCTION_DOCUMENT_ROOT"/$PRODUCTION_WORDPRESS_FOLDER";
PRODUCTION_PATH_BASENAME=$(basename $PRODUCTION_PATH);
PRODUCTION_PUBLIC_PATH=$PRODUCTION_PATH"/"$DEFAULT_PUBLIC_FOLDER;


PRODUCTION_IMAGES_PATH="$PRODUCTION_PATH/$DEFAULT_UPLOAD_FOLDER";
PRODUCTION_WORDPRESS_URL="$DEFAULT_HTTP_PROTOCOL://$PRODUCTION_SERVER/$PRODUCTION_PATH_BASENAME/$DEFAULT_PUBLIC_FOLDER";

# ====================================================================
# Local computed configuration; should not be modified ==========

LOCAL_DOCUMENT_ROOT=$DEFAULT_DOCUMENT_ROOT;
LOCAL_PATH="$DEFAULT_DOCUMENT_ROOT/$LOCAL_WORDPRESS_FOLDER";
LOCAL_PATH_BASENAME=$(basename $LOCAL_PATH);
LOCAL_PUBLIC_PATH=$LOCAL_PATH"/"$DEFAULT_PUBLIC_FOLDER;

# LOCAL_WORDPRESS_PUBLIC_FOLDER="$LOCAL_WORDPRESS_FOLDER/$DEFAULT_PUBLIC_FOLDER";


LOCAL_IMAGES_PATH="$LOCAL_PATH/$DEFAULT_PUBLIC_PATH_NAME/$DEFAULT_UPLOAD_FOLDER";
LOCAL_WORDPRESS_URL="$DEFAULT_HTTP_PROTOCOL://$DEFAULT_LOCAL_HOST/$LOCAL_WORDPRESS_FOLDER/$DEFAULT_PUBLIC_FOLDER";


# echo "=========Configuration======="
# echo SSH_KEY $SSH_KEY

# echo PRODUCTION_SERVER $PRODUCTION_SERVER
# echo PRODUCTION_PATH $PRODUCTION_PATH "-" $PRODUCTION_PATH_BASENAME
# echo PRODUCTION_IMAGES_PATH $PRODUCTION_IMAGES_PATH

# echo LOCAL_PATH $LOCAL_PATH
# echo LOCAL_IMAGES_PATH $LOCAL_IMAGES_PATH

# echo "============================="
# echo
