<?php

namespace WDL;

class WordpressRouter
{

    // STEP router Ne pas oublier de configurer wordpress pour les routes custom
    protected $customRoutes = [
        'wdl-all' => 'wdl/.*',
    ];

    public function __construct()
    {
        $this->registerRoutes();
    }

    public function registerRoutes()
    {
        foreach($this->customRoutes as $routeName => $uri) {
            add_rewrite_rule(
                // regexp de validation de l'url demandée par le visiteur
                // lorsque dans l'url il y aura la chaine "user" suivi d'un "/" optionnel, suivi de n'importe quoi
                // NOTICE ROUTER attention wordpress ne gère pas le / au début de la regexp
                $uri,
                // "URL virtuelle" comprise par wordpress
                // de façon nous définissons une variable "$_GET" userRoute=true
                'index.php?' . $routeName . '=true',
                    // la règle se mettre en haut de la pile de priorité (donc sera la plus importante)
                // Nous n'avons pas envie que wordpress gère avant "nous" la route
                'top'
            );
        }


        // STEP E9 ROUTER rafraichissement du cache des règle de routing de wp
        // Wp enregistre les routes en bdd, il faut rafraichir les routes
        // WARNING flush_rewrite_rules il faudrait flush les routes seulement à l'activation du plugin. flush_rewrite_rules peut être très lent en terme de performances si beaucoup de contenu
        flush_rewrite_rules();

        add_filter('query_vars', [$this, 'watchVariables']);

        // STEP E9 ROUTER chargement du bon fichier / template
        add_filter('template_include', [$this, 'loadCustomRouter']);
    }

    public function watchVariables($query_vars)
    {
        // STEP E9 ROUTER Wordpress doit surveiller une liste de variables passées dans l'url virtuelle
        foreach ($this->customRoutes as $routeName => $uri) {
            $query_vars[] = $routeName;
        }
        return $query_vars;
    }

    // STEP E9 ROUTER chargement du router custom si une route custom a été demandée
    public function loadCustomRouter($templateFile)
    {

        // si nous sommes sur une route custom, nous ne laisson pas wordpress choisir son template
        foreach($this->customRoutes as $routeName => $uri) {

            $variableExists = get_query_var($routeName);

            if($variableExists) {
                // si wordpress a détecté dans l"url "virtuelle" une variable GET portant le nom d'une de nos routes ; nous chargeons le fichier qui lance notre router
                return __DIR__ .'/../router-run.php';
            }
        }

        // par défaut (si aucune route custom n'a été trouvée) ; nous laissons wordpress choisir son template
        return $templateFile;
    }
}
