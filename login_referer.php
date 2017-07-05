<?php

/**
 * Redirect on login to 'referer' query param
 *
 * @version 1.0 - 2017-07-05
 * @Original author Molodtsov Dmitriy
 * @website http://vision-studio.ru
 * @licence GNU GPL
 * @        1.0 - released
 **/
/**
 * Notice: This plugin must run as the last plugins because it exits
  *         on the 'login_after' hook !
**/
 
class login_referer extends rcube_plugin
{
  public $task = 'login';
  // we've got no ajax handlers
  public $noajax = true;
  // skip frames
  public $noframe = true;

  private $redirect_param = 'referer';

  function init()
  {
    $this->add_hook('login_after', array($this,'login_after'));
  }

  // user login
  function login_after($args)  
  {        

    $rcmail = rcmail::get_instance();
    $this->load_config();
    $param = $rcmail->config->get('login_referer_param');
    $this->redirect_param = ($param) ? $param : $this->redirect_param;
    $url_params = null;
    $parts = parse_url($_SERVER['HTTP_REFERER']);
    parse_str($parts['query'], $url_params);
    if(isset($url_params[$this->redirect_param])) {
      $redirect_url = $url_params[$this->redirect_param];
      setcookie ('ajax_login','',time()-3600);
      header("Location: $redirect_url", true, 303);
      exit;
    }
    return $args; 
  } 
     
}
?>
