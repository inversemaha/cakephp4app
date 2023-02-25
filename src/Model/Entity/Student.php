<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\ORM\Entity;
class Student extends Entity
{
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'phone' => true,
        'gender' => true,
        'profile_image' => true,
        'created_at' => true,
    ];
}
