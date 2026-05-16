<?php
declare(strict_types=1);

// SearchNotice SDK exists test

require_once __DIR__ . '/../searchnotice_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = SearchNoticeSDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}
