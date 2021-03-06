<?php

namespace Intercom\Client;

use GuzzleHttp\ClientInterface as Guzzle;

use Intercom\AbstractClient,
    Intercom\Object\Event as EventObject,
    Intercom\Request\Request;

class Event extends AbstractClient
{
    /**
     * Create an Event
     *
     * @param  EventObject   $event
     *
     * @throws HttpClientException
     *
     * @return GuzzleHttp\Message\Response
     */
    public function create(EventObject $event)
    {
        return $this->send(new Request('POST', self::INTERCOM_BASE_URL . '/events', [], $event->format()));
    }
}
