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
        "<ul>
            <li><?php echo $this->Html->link('Register',array('controller' => 'users','action' => 'add'));  ?></li>
        </ul>";
    }else{
        echo "Hello there ".AuthComponent::user('name');

    }
?>