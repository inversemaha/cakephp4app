<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;

class User extends Entity
{
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'phone' => true,
        'gender' => true,
        'password' => true,
        'profile_image' => true,
        'created_at' => true,
    ];
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($password)
    {
        return Security::hash($password, 'sha256', true);
    }
}
