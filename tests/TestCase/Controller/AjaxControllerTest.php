<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\AjaxController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\AjaxController Test Case
 *
 * @uses \App\Controller\AjaxController
 */
class AjaxControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Ajax',
    ];
}
