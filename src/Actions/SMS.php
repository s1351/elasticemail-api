<?php

namespace s1351\ElasticEmailAPI\Actions;

use s1351\ElasticEmailAPI\Client\Curl;

class SMS
{
  /**
   * Request container.
   *
   * @var
   */
  private $request;

  /**
   * Construct class.
   * 
   * @param  Auth $auth
   * @param  Uri  $uri
   * @return void
   */
  public function __construct($auth, $uri)
  {
    $this->request = new Curl($auth, $uri);
  }

  /**
   * Send an SMS.
   *
   * @param  array  $data
   * @return bool
   */
  public function send(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('sms/send');

    return $this->request->request();
  }

}