<?php
/*
 * Copyright (c) Shingo OKAWA <shingo.okawa.n.a@gmail.com>
 */
namespace Illuminate\YetAnother\Cache\Serializer\Coder\Codec;

use \Exception;
use Illuminate\YetAnother\Cache\Serializer\Coder\CoderDrivenTrait;
use Illuminate\YetAnother\Cache\Serializer\Coder\CodecInterface;

/**
 * [Yet Another Implementation]
 * Provides functionality to encode/decode values.
 *
 * @author Shingo OKAWA
 */
class MessagePack implements CodecInterface
{
    /** Enables to access to the driving coder. */
    use CoderDrivenTrait;

    /**
     * Encodes given value into the serialized codes in accordance with
     * the predefined codec.
     *
     * @param  mixed $value value to be encoded.
     * @return array array of the encoded strings.
     */
    public function encode($value)
    {
        if (function_exists('msgpack_pack')) {
            return msgpack_pack($value);
        }
        return serialize($value);
    }

    /**
     * Decodes given value into the on-memory instance in accordance with
     * the predefined codec.
     *
     * @param  mixed $value value to be decoded.
     * @return mixed instance which is decoded.
     */
    public function decode($value)
    {
        if (function_exists('msgpack_unpack')) {
            return msgpack_unpack($value);
        }
        return unserialize($value);
    }
}