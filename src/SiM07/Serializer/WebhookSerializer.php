<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 17/11/2017
 * Time: 21:54
 */

namespace SiM07\Serializer;

use SiM07\Entity\Webhook;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class WebhookSerializer
{
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * WebhookSerializer constructor.
     */
    public function __construct()
    {
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                null,
                new CamelCaseToSnakeCaseNameConverter(),
                null,
                new PhpDocExtractor()
            )
        ];

        $encoders = [
            new JsonEncoder()
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param string $data
     * @return Webhook
     */
    public function deserialize(string $data)
    {
        return $this->serializer->deserialize($data, Webhook::class, 'json');
    }
}
