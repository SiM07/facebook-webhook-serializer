<?php

namespace Tests\SiM07\Serializer;

use PHPUnit\Framework\TestCase;
use SiM07\Entity\Webhook;
use SiM07\Entity\Webhook\Entry;
use SiM07\Entity\Webhook\Entry\Change;
use SiM07\Entity\Webhook\Entry\Change\Value;
use SiM07\Entity\Webhook\Entry\Messaging;
use SiM07\Entity\Webhook\Entry\Messaging\Message;
use SiM07\Entity\Webhook\Entry\Messaging\Message\QuickReply;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Email;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Location;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Nlp\Entities\Datetime;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Attachment;
use SiM07\Entity\Webhook\Entry\Messaging\Message\Attachment\Payload;
use SiM07\Serializer\WebhookSerializer;
use SiM07\Entity\Webhook\Entry\Messaging\Sender;
use SiM07\Entity\Webhook\Entry\Messaging\Recipient;

class WebhookSerializerTest extends TestCase
{
    public function testDeserializeBasicMessage()
    {
        $webhook = $this->getWebhook('message-basic');

        $this->assertEquals('page', $webhook->getObject());
        $this->assertCount(1, $webhook->getEntry());
        $this->assertArrayHasKey(0, $webhook->getEntry());

        /** @var Entry $entry */
        $entry = $webhook->getEntry()[0];

        $this->assertInstanceOf(Entry::class, $entry);
        $this->assertSame('162147347713864', $entry->getId());
        $this->assertSame(1510930616452, $entry->getTime());
        $this->assertCount(1, $entry->getMessaging());
        $this->assertArrayHasKey(0, $entry->getMessaging());

        /** @var Messaging $messaging */
        $messaging = $entry->getMessaging()[0];

        $this->assertInstanceOf(Messaging::class, $messaging);
        $this->assertSame(1510930615227, $messaging->getTimestamp());
        $this->assertEquals((new Sender())->setId(1495674840531110), $messaging->getSender());
        $this->assertEquals((new Recipient())->setId(162147347713864), $messaging->getRecipient());

        /** @var Message $message */
        $message = $messaging->getMessage();

        $this->assertInstanceOf(Message::class, $message);
        $this->assertSame('mid.$cAACTePYBfy1l-8DTu1fynuLSrCa5', $message->getMid());
        $this->assertSame(38708, $message->getSeq());
        $this->assertSame('Ceci est un message basique.', $message->getText());
    }

    public function testDeserializePhotoMessage()
    {
        $webhook = $this->getWebhook('message-photo');

        /** @var Message $message */
        $message = $webhook->getEntry()[0]->getMessaging()[0]->getMessage();
        $this->assertCount(1, $message->getAttachments());
        $this->assertArrayHasKey(0, $message->getAttachments());

        /** @var Attachment $attachment */
        $attachment = $message->getAttachments()[0];

        $this->assertSame('image', $attachment->getType());
        $this->assertEquals(
            (new Payload())->setUrl('https://scontent.xx.fbcdn.net/v/t35.0-12/23698679_10155871825688518_30167719_o.jpg?_nc_ad=z-m&_nc_cid=0&oh=b6ef8f5b4ae40f29477d1e770f6e33a1&oe=5A11F927'),
            $attachment->getPayload()
        );
    }

    public function testDeserializeNlpEmailsMessage()
    {
        $webhook = $this->getWebhook('message-nlp-emails');

        /** @var Nlp $nlp */
        $nlp = $webhook->getEntry()[0]->getMessaging()[0]->getMessage()->getNlp();
        $this->assertInstanceOf(Nlp::class, $nlp);

        /** @var Entities $entities */
        $entities = $nlp->getEntities();
        $this->assertInstanceOf(Entities::class, $entities);

        $this->assertCount(2, $entities->getEmail());
        $this->assertArrayHasKey(0, $entities->getEmail());
        $this->assertArrayHasKey(1, $entities->getEmail());
        $this->assertInstanceOf(Email::class, $entities->getEmail()[0]);
        $this->assertInstanceOf(Email::class, $entities->getEmail()[1]);

        $email = new Email();
        $email->setConfidence(0.75095578432413);
        $email->setValue('toto@toto.com');
        $email->setEntity('email');
        $email->setBody('toto@toto.com');
        $email->setStart(25);
        $email->setEnd(38);

        $this->assertEquals($email, $entities->getEmail()[0]);

        $email = $entities->getEmail()[1];
        $this->assertSame(0.99590875518415, $email->getConfidence());
        $this->assertSame('tata@tata.com', $email->getValue());
        $this->assertSame('email', $email->getEntity());
        $this->assertSame('tata@tata.com', $email->getBody());
        $this->assertSame(41, $email->getStart());
        $this->assertSame(54, $email->getEnd());

    }

    public function testDeserializeNlpLocationAndDateTimeMessage()
    {
        $webhook = $this->getWebhook('message-nlp-location-datetime');

        $nlp = $webhook->getEntry()[0]->getMessaging()[0]->getMessage()->getNlp();
        $this->assertInstanceOf(Nlp::class, $nlp);

        /** @var Entities $entities */
        $entities = $nlp->getEntities();
        $this->assertInstanceOf(Entities::class, $entities);
        $this->assertCount(1, $entities->getLocation());
        $this->assertArrayHasKey(0, $entities->getLocation());
        $this->assertCount(1, $entities->getDatetime());
        $this->assertArrayHasKey(0, $entities->getDatetime());
        $this->assertNull($entities->getEmail());

        /** @var Location $location */
        $location = $entities->getLocation()[0];
        $this->assertTrue($location->isSuggested());
        $this->assertSame(0.93605, $location->getConfidence());
        $this->assertSame('Rennes', $location->getValue());
        $this->assertSame('value', $location->getType());
        $this->assertSame('location', $location->getEntity());
        $this->assertSame('Rennes', $location->getBody());
        $this->assertSame(6, $location->getStart());
        $this->assertSame(12, $location->getEnd());

        /** @var Datetime $datetime */
        $datetime = $entities->getDatetime()[0];
        $datetime->getConfidence();
        $values = [
            ['value' => '2017-11-19T15:00:00.000+01:00', 'grain' => 'hour', 'type' => 'value'],
            ['value' => '2017-11-26T15:00:00.000+01:00', 'grain' => 'hour', 'type' => 'value'],
            ['value' => '2017-12-03T15:00:00.000+01:00', 'grain' => 'hour', 'type' => 'value'],
        ];
        $this->assertSame($values, $datetime->getValues());
        $this->assertSame('2017-11-19T15:00:00.000+01:00', $datetime->getValue());
        $this->assertSame('hour', $datetime->getGrain());
        $this->assertSame('value', $datetime->getType());
        $this->assertSame('datetime', $datetime->getEntity());
        $this->assertSame('dimanche à 15h', $datetime->getBody());
        $this->assertSame(13, $datetime->getStart());
        $this->assertSame(27, $datetime->getEnd());
    }

    public function testDeserializeNlpDatetimeIntervalMessage()
    {
        $webhook = $this->getWebhook('message-nlp-datetime-interval');
        /** @var Datetime $datetime */
        $datetime = $webhook->getEntry()[0]->getMessaging()[0]->getMessage()->getNlp()->getEntities()->getDatetime()[0];
        $this->assertInstanceOf(Datetime::class, $datetime);

        $values = [[
            'to' => ['value' => '2017-11-21T00:00:00.000+01:00', 'grain' => 'day'],
            'from' => ['value' => '2017-11-18T00:00:00.000+01:00', 'grain' => 'day'],
            'type' => 'interval'
        ]];

        $this->assertEquals($values, $datetime->getValues());
        $this->assertSame('interval', $datetime->getType());
        $this->assertEquals(['value' => '2017-11-18T00:00:00.000+01:00', 'grain' => 'day'], $datetime->getFrom());
        $this->assertEquals(['value' => '2017-11-21T00:00:00.000+01:00', 'grain' => 'day'], $datetime->getTo());
    }

    public function testDeserializeQuickReplyMessage()
    {
        $webhook = $this->getWebhook('message-quickreply');

        /** @var Message $message */
        $message = $webhook->getEntry()[0]->getMessaging()[0]->getMessage();

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(QuickReply::class, $message->getQuickReply());
        $this->assertSame('SAV', $message->getQuickReply()->getPayload());
    }

    public function testDeserializeNewLikePage()
    {
        $webhook = $this->getWebhook('page-new-like');

        $this->assertSame('page', $webhook->getObject());
        $this->assertCount(1, $webhook->getEntry());
        $this->assertArrayHasKey(0, $webhook->getEntry());

        $entry = $webhook->getEntry()[0];

        $this->assertSame('162147347713864', $entry->getId());
        $this->assertSame(1510930967, $entry->getTime());
        $this->assertCount(1, $entry->getChanges());
        $this->assertArrayHasKey(0, $entry->getChanges());

        /** @var Change $change */
        $change = $entry->getChanges()[0];
        $this->assertInstanceOf(Change::class, $change);
        $this->assertSame('feed', $change->getField());
        $this->assertInstanceOf(Value::class, $change->getValue());

        $value = $change->getValue();
        $this->assertSame('like', $value->getItem());
        $this->assertSame('verb', $value->getVerb());
        $this->assertSame('10155839246233518', $value->getSenderId());
    }

    /**
     * @param $type
     * @return Webhook
     */
    private function getWebhook(string $type)
    {
        $data = file_get_contents(__DIR__ . '/../fixtures/'.$type.'.json');

        $serializer = new WebhookSerializer();
        return $serializer->deserialize($data);
    }
}
