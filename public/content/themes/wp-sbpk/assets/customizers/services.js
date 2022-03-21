console.log('%c' + "banner-picture.js loaded", 'color: #0bf; font-size: 1rem; background-color:#fff');

document.addEventListener("DOMContentLoaded", function() {

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceTitle1',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTitleOne = document.querySelector('.serviceTitle1');
        serviceTitleOne.innerHTML = newValue;
      });
    }
  );

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceText1',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTextOne = document.querySelector('.serviceText1');
        serviceTextOne.innerHTML = newValue;
      });
    }
  );

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceTitle2',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTitleTwo = document.querySelector('.serviceTitle2');
        serviceTitleTwo.innerHTML = newValue;
      });
    }
  );

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceText2',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTextTwo = document.querySelector('.serviceText2');
        serviceTextTwo.innerHTML = newValue;
      });
    }
  );

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceTitle3',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTitleThree = document.querySelector('.serviceTitle3');
        serviceTitleThree.innerHTML = newValue;
      });
    }
  );

  wp.customize(
    // sur quelle variable le javascript doit gérer le live preview
    'serviceText3',

    // déclaration de la fonction qui "gère" la variable customisée
    function(value) {
      value.bind(function(newValue) {

        //=====CODE CUSTOM=========
        // cette fonction se déclenche lorsque la "variable customisée" change de valeur
        // nous ciblons la bannière
        console.log(newValue);

        let serviceTextThree = document.querySelector('.serviceText3');
        serviceTextThree.innerHTML = newValue;
      });
    }
  );
});