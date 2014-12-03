<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<?php
    if(!AuthComponent::user()) {
        echo
        "<h1 style='font-size: 150%'>Welcome to the PAS</h1>
            <ul>
            <li>";
            echo $this->Html->link('Register',array('controller' => 'users','action' => 'add'));
        echo "</li>
        </ul>";
    }else{
        echo "Hello there ".AuthComponent::user('name');
    }
?>