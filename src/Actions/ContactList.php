<?php

namespace s1351\ElasticEmailAPI\Actions;

use s1351\ElasticEmailAPI\Client\Curl;

class ContactList
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
   * Add existing contacts to chosen list.
   *
   * @param  array  $data
   * @return bool
   */
  public function addContacts(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('list/addcontacts');

    return $this->request->request();
  }

  /**
   * Show all existing lists.
   * 
   * @param  array  $data
   * @return array
   */
  public function list(array $data)
  {
    $this->request->setData($data);
    $this->request->setMethod('GET');
    $this->request->setUrl('list/list');

    return $this->request->request();
  }

}