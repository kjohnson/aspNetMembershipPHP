<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class HashTest extends TestCase
{
    public function testTrue(): void
    {
        $password = 'password';
        $salt = 'a94ysmjYGFQNu9OdHnidVg==';
        $hash = new \AspNetMembershipPHP\Hash( $password, $salt );
        $this->assertTrue(
            $hash->compareHash('3/IlHRKll+gnB6tc7r49C2L2tec=')
        );
    }
}