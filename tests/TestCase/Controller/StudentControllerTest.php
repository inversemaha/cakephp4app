<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\StudentController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\StudentController Test Case
 *
 * @uses \App\Controller\StudentController
 */
class StudentControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Student',
    ];
}
