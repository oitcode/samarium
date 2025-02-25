<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    /**
     * Test that user table has a role column.
     *
     * @return void
     */
    public function test_user_table_has_a_role_column()
    {
        $this->assertTrue(Schema::hasColumn('users', 'role'));
    }
}
