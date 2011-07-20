<?php
/*
 * Important set of helper variables for usage in the layout template.
 *
 * 
 */

use_helper('rtTemplate');

$routes = $sf_context->getRouting()->getRoutes();

$module = $sf_request->getParameter('module');
$action = $sf_request->getParameter('action');

$area_class  = Doctrine_Inflector::urlize(sfInflector::tableize($module));
$area_class .= ' ' . $area_class .  '-'. Doctrine_Inflector::urlize(sfInflector::tableize($action));

$snippet_area = Doctrine_Inflector::urlize(sfInflector::tableize($module) . '-' . sfInflector::tableize($action));
