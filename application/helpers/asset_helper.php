<?php


if( ! defined('BASEPATH'))  exit('No direct script access allowed');


         //configuration des url pour le chargement des fichiers css


if ( ! function_exists('css_url')){
    function css_url($nom){
        return base_url() . 'assets/css/' . $nom . '.css';
    }
}



if ( ! function_exists('css')){
    function css($nom){
        return '<link rel="stylesheet" type="text/css" media="all" href="' . css_url($nom) . '" />';
    }
}

           //configuration des url pour le chargement des fichiers js


if ( ! function_exists('js_url')){
    function js_url($nom){
        return base_url() . 'assets/javascript/' . $nom . '.js';
    }
}



if ( ! function_exists('js')){
    function js($nom){
        return '<script type="text/javascript" src="' .js_url($nom) .'" > </script>';
    }
}

       //configuration des url pour le chargement des fichiers image


if ( ! function_exists('img_url')){
    function img_url($nom){
        return base_url() . 'assets/images/' . $nom;
    }
}
if ( ! function_exists('img')){
    function img($nom, $alt = '',$class='',$title=''){
        return '<img title="'.$title. '" src="' . img_url($nom) . '" alt="' . $alt . '" class="'.$class. '" style="'.$style.'" />';
    }
}


if ( ! function_exists('imgProfil')){
    function imgProfil($nom, $class='',$alt = '',$title=''){
        return '<img title="'.$title. '" src="' . imgProfil_url($nom) . '" alt="' . $alt . '" class="'.$class.'" />';
    }
}

if ( ! function_exists('imgProfil_url')){
    function imgProfil_url($nom){
        return base_url() . 'assets/images/user_profil/' . $nom;
    }
}



?>