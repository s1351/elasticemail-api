<?php

namespace s1351\ElasticEmailAPI\Actions;

use s1351\ElasticEmailAPI\Client\Curl;

class Contact
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
   * Add a new contact and optionally to one of your lists.
   * 
   * @param  array $data
   * @return bool
   */
  public function add(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('contact/add');

    return $this->request->request();
  }

  /**
   * Manually add or update a contacts status to Abuse or Unsubscribed status (blocked).
   * 
   * @param  array $data
   * @return bool
   */
  public function addBlocked(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('contact/addblocked');

    return $this->request->request();
  }

  /**
   * Finds all Lists and Segments this email belongs to.
   * 
   * @param  array  $data
   * @return array
   */
  public function findContact(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('contact/findcontact');

    return $this->request->request();
  }

}