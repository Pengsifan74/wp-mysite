CURRENT_PATH=$(pwd);

echo "✔️ Loading utils";
. $CURRENT_PATH"/_include/functions.sh"


echo "✔️ Importing configuration file";
. $CURRENT_PATH"/config.sh"


MYSQL_HOST=$(ask "Mysql host" $LOCAL_MYSQL_HOST)
echo "✔️ Mysql database : " $MYSQL_HOST;
echo


MYSQL_USER=$(ask "Mysql user" $LOCAL_MYSQL_USER)
echo "✔️ Mysql user : " $MYSQL_USER;
echo


MYSQL_PASSWORD=$(ask "Mysql password" $LOCAL_MYSQL_PASSWORD)
echo "✔️ Mysql password : " $MYSQL_PASSWORD;
echo

MYSQL_DATABASE=$(ask "Mysql database" $LOCAL_MYSQL_DATABASE)
echo "✔️ Mysql database : " $MYSQL_DATABASE;
echo

echo
echo "=============================================="
echo

echo "✔️ Exporting database";
ssh_exec "mysqldump -h$PRODUCTION_MYSQL_HOST -u$PRODUCTION_MYSQL_USER -p$PRODUCTION_MYSQL_PASSWORD $PRODUCTION_MYSQL_DATABASE > /tmp/$PRODUCTION_MYSQL_DATABASE.sql"

echo "✔️ Downloadind database export";
scp -i $SSH_KEY $PRODUCTION_USER@$PRODUCTION_SERVER:/tmp/$PRODUCTION_MYSQL_DATABASE.sql /tmp/$PRODUCTION_MYSQL_DATABASE.sql


echo "✔️ Importing database";
cat /tmp/$PRODUCTION_MYSQL_DATABASE.sql | mysql -h$LOCAL_MYSQL_HOST -u$LOCAL_MYSQL_USER -p$LOCAL_MYSQL_PASSWORD $LOCAL_MYSQL_DATABASE

echo "✔️ Updating data";

WP_updateOption "siteurl" "${LOCAL_WORDPRESS_URL}/wp"
WP_updateOption "home" "${LOCAL_WORDPRESS_URL}/wp"

echo

echo "✔️ Importing images from production";
. $CURRENT_PATH"/import-image.sh"

