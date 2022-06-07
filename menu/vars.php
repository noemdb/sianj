<?php

$url = 'http://192.168.0.106/sia/menu/login.php?module=';
$urlhome = 'http://192.168.0.106/sia/menu/';

$arr_module = [
    [
    'nom_module'=>'CONFIGURACIÓN Y MANTENIMIENTO',
    'nom_module_sm'=>'CONFIGURACIÓN',
    'url_module'=>'empresa',
    'icon'=>'fas fa-cogs',
    'color'=>'primary'
    ],
        [
    'nom_module'=>'CONTABILIDAD FISCAL',
    'nom_module_sm'=>'PAGOS',
    'url_module'=>'contabilidad',
    'icon'=>'fas fa-book',
    'color'=>'success'
    ],
    [
    'nom_module'=>'CONTABILIDAD PRESUPUESTARIA',
    'nom_module_sm'=>'PRESUPUESTARIA',
    'url_module'=>'presupuesto',
    'icon'=>'far fa-money-bill-alt',
    'color'=>'info'
    ],
    [
    'nom_module'=>'CONTROL BANCARIO',
    'nom_module_sm'=>'BANCARIO',
    'url_module'=>'bancos',
    'icon'=>'fas fa-university',
    'color'=>'danger'
    ],
    [
    'nom_module'=>'BIENES NACIONALES',
    'nom_module_sm'=>'PAGOS',
    'url_module'=>'bienes',
    'icon'=>'fas fa-warehouse',
    'color'=>'warning'
    ],
    [
    'nom_module'=>'NOMINA Y PERSONAL',
    'nom_module_sm'=>'NOMINA',
    'url_module'=>'nomina',
    'icon'=>'fas fa-users',
    'color'=>'primary'
    ],
    [
    'nom_module'=>'ORDENAMIENTO DE PAGOS',
    'nom_module_sm'=>'PAGOS',
    'url_module'=>'pagos',
    'icon'=>'fas fa-money-check-alt',
    'color'=>'dark'
    ],

];

$main_title = $arr_module[$_GET['module']]['nom_module']; 
$main_title_sm = $arr_module[$_GET['module']]['nom_module_sm']; 
$main_url = $arr_module[$_GET['module']]['url_module']; 
$main_icon = $arr_module[$_GET['module']]['icon']; 
$main_color = $arr_module[$_GET['module']]['color']; 

?>