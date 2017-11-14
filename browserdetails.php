<?php
/**
 * Created by Salman Zafar.
 * User: Salman
 * Date: 11/14/2017
 * Time: 1:55 PM
 */

class Browser{
    protected $browser;
    public function user_browser()
    {
        return $this->browser = $_SERVER['HTTP_USER_AGENT']; //get_browser(null,true);
    }
}

$br = new Browser();
$ub = $br->user_browser();
echo $ub;