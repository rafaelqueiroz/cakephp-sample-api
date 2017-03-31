<?php
namespace Recipe\Event;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;
use Recipe\Model\Entity\User;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class UserWelcome implements EventListenerInterface
{

    /**
     * @return array
     */
    public function implementedEvents()
    {
        return [
            'User.afterRegister' => 'sendEmail'
        ];
    }

    /**
     * @param Event $event
     * @param User $user
     * @return bool
     */
    public function sendEmail(Event $event, User $user)
    {
        $email = new Email('default');
        $email->setFrom('contact@recipes-api', 'Recipe API');
        $email->setTo($user->email);
        $email->setTemplate('Users/welcome');
        $email->set('user', $user);

        if ($email->send()) {
            return true;
        }

        return false;
    }

}