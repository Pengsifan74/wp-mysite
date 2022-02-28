# script de création rapide d'une base de donnée avec son utilisateur associé
# le login et le mot de passe de l'utilisateur sont identiques
# usge : sh createdb.sh DATABASE_NAME USER_NAME


USER="explorateur";
PASSWORD="Ereul9Aeng";
HOST="localhost";

if [ -z $1 ]; then
    echo "Vous devez spécifier en premier argument le nom de la base de données que vous voulez créer";
    exit 1;
fi

if [ -z $2 ]; then
    echo "Vous devez spécifier en second argument le nom d'utilisateur pour la base de données";
    exit 2;
fi

NEW_DATABASE=$1;
NEW_USER_NAME=$2;
NEW_USER_PASSWORD=$2;


DATABASE_EXIST=$(mysql -h$HOST -u$USER -p$PASSWORD -e"SHOW DATABASES" | grep -e ^$NEW_DATABASE\$)

if [ ! -z $DATABASE_EXIST ]; then
    echo "La base de donnée $NEW_DATABASE existe";
    exit 3;
fi

USER_EXISTS=$(mysql -u$USER -p$PASSWORD -h$HOST -s -N -e"SELECT 1 FROM mysql.user WHERE user = '$NEW_USER_NAME'");

if [ ! -z $USER_EXISTS ]; then
    echo "L'utilisateur $NEW_USER_NAME existe";
    exit 4;
fi

# création de l'utilisateur
mysql -h$HOST -u$USER -p$PASSWORD -e"CREATE USER $NEW_USER_NAME@'localhost' IDENTIFIED BY '$NEW_USER_PASSWORD';" mysql

# création de la base de données
mysql -h$HOST -u$USER -p$PASSWORD -e"CREATE DATABASE $NEW_DATABASE CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci"

# autorisation de l'utilisateur sur la nouvelle base de donnée
mysql -h$HOST -u$USER -p$PASSWORD -e"GRANT ALL PRIVILEGES ON $NEW_DATABASE.* TO '$NEW_USER_NAME'@'localhost';" mysql


# affichage de la liste des bases de données pour le nouvel utilisateur
echo "Bases de données accessible pour $NEW_USER_NAME";
mysql -h$HOST -u$NEW_USER_NAME -p$NEW_USER_PASSWORD -e"SHOW DATABASES"

# change user password
# mysql -h$HOST -u$USER -p$PASSWORD -e"ALTER USER 'oprofile'@'localhost' IDENTIFIED BY '$NEW_USER_PASSWORD'; FLUSH PRIVILEGES;"

