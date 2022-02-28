CURRENT_PATH=$(pwd);
. $CURRENT_PATH"/config.sh"
. $CURRENT_PATH"/_include/functions.sh"


CURRENT_BRANCH=$(git rev-parse --abbrev-ref HEAD)


echo "💬 Vous êtes sur la branche $CURRENT_BRANCH";
echo

read -p "❓ Avez vous bien pensé à commit ? y/[n] : " CONFIRM;
if [ "$CONFIRM" = "y" ]; then
    echo "💬 Suite de la mise en production";
else
    read -p "❓ Voulez vous laisser le script gérer le commit ? [y]/n : " CONFIRM;
    if [ "$CONFIRM" = "n" ]; then
        echo "❌ Abandon de la mise en production";
        git status;
        exit;
    else

        echo "✔️ commit automatique";
        git add $LOCAL_PATH
        git commit -m "commit automatique avant mep"
        git push

        git checkout develop
        git merge $CURRENT_BRANCH
    fi
fi


read -p "❓ Gestion de la branche master automatique ? [y]/n : " CONFIRM;
if [ "$CONFIRM" = "n" ]; then
    echo "❌ Gestion de la branche master ignorée";
else
    echo "✔️ git checkout develop";
    git checkout develop

    echo "✔️ git pull (develop)";
    git pull

    echo "✔️ git checkout master";
    git checkout master

    echo "✔️ git pull  (dans master)";
    git pull

    echo "✔️ git checkout develop";
    git checkout develop

    echo "✔️ git merge master (dans develop)";
    git merge master

    echo "✔️ git push (dans develop)";
    git push


    echo "✔️ git checkout master";
    git checkout master


    echo "✔️ git merge develop (dans master)";
    git merge develop

    echo "✔️ git push (master";
    git push

    echo "✔️ git checkout develop";
    git checkout develop
fi


echo
echo "=============================================="
echo

echo "✔️ Mise à jour de master sur la production";
ssh_exec "cd $PRODUCTION_PATH && git pull"

echo "✔️ Désactivation et réactivation du plugin";
ssh_exec "cd $PRODUCTION_PUBLIC_PATH && wp plugin deactivate --all && wp plugin activate --all"

echo
echo "=============================================="
echo

echo "✔️ Retour sur la branche $CURRENT_BRANCH";
git checkout $CURRENT_BRANCH

echo
echo "✔️ Vous êtes sur la branche $CURRENT_BRANCH";
echo
echo "🔥 Mise en production terminée";
echo
