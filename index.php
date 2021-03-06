<?php
require_once 'init.php';
$theme = 'theme1';
new TSession;

ob_start();
$menu = TMenuBar::newFromXML('menu.xml');
$menu->show();
$menu_string = ob_get_clean();

$content  = file_get_contents("app/templates/{$theme}/layout.html");
//$content  = ApplicationTranslator::translateTemplate($content);
$content  = str_replace('{LIBRARIES}', file_get_contents("app/templates/{$theme}/libraries.html"), $content);
$content  = str_replace('{class}', isset($_REQUEST['class']) ? $_REQUEST['class'] : '', $content);
$content  = str_replace('{template}', $theme, $content);
$content  = str_replace('{MENU}', $menu_string, $content);
$css      = TPage::getLoadedCSS();
$js       = TPage::getLoadedJS();
$content  = str_replace('{HEAD}', $css.$js, $content);

echo $content;

if (isset($_REQUEST['class']))
{
    $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : NULL;
    AdiantiCoreApplication::loadPage($_REQUEST['class'], $method, $_REQUEST);
}