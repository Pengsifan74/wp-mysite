WP_updateOption() {
    QUERY="UPDATE \`${TABLE_PREFIX}options\` SET \`option_value\`='${2}/wp' WHERE \`option_name\`='${1}'"
    echo $QUERY
    mysql -h$LOCAL_MYSQL_HOST -u$LOCAL_MYSQL_USER -p$LOCAL_MYSQL_PASSWORD $LOCAL_MYSQL_DATABASE -e "${QUERY}"
}

WP_fixChmod()
{
    echo "✔️ Fixing local $LOCAL_IMAGES_PATH chmod";
    echo sudo chown -R $USER:$DEFAULT_APACHE_USER $LOCAL_IMAGES_PATH;
    sudo chown -R $USER:$DEFAULT_APACHE_USER $LOCAL_IMAGES_PATH;
    sudo chmod -R 774 $LOCAL_IMAGES_PATH;
}

ask() {
    if [ -z $2 ]; then
        read -p "❔ $1 : " VALUE;
    else
        read -p "❔ $1 ($2) :" VALUE;
    fi;

    if [ -z $VALUE ]; then
        echo $2
    else
        echo $VALUE
    fi
}

ssh_exec() {
    if [ -z SSH_KEY ]; then
        ssh $PRODUCTION_USER@$PRODUCTION_SERVER "$1"
    else
        ssh -i $SSH_KEY $PRODUCTION_USER@$PRODUCTION_SERVER "$1"
    fi
}


