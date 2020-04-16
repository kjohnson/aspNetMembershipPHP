<?php

namespace AspNetMembershipPHP;

class Hash
{
    /** @var string */
    protected $password;

    /** @var string */
    protected $salt;

    /**
     * @param string $password
     * @param string $salt
     */
    public function __construct( $password, $salt )
    {
        $this->password = mb_convert_encoding($password, 'UTF-16LE', 'UTF-8');
        $this->salt = base64_decode( $salt );
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function compareHash( $hash )
    {
        return hash_equals(
            $hash,
            base64_encode(
                hash( $this->getHashAlgorithm(), $this->salt.$this->password, $raw_output = true )
            )
        );
    }

    /**
     * @return string
     */
    protected function getHashAlgorithm()
    {
        return 'sha1';
    }
}
