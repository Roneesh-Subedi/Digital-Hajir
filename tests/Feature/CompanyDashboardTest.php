<?php
use Inertia\Testing\AssertableInertia as Assert;

test('company dashboard exists', function () {
    $response = $this->get('/company/dashboard');
    $response->assertStatus(200);
});
