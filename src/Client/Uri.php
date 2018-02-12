<?php

namespace s1351\ElasticEmailAPI\Client;

class Uri
{
  /**
   * API uri.
   * 
   * @var string
   */
  private $apiUri = 'https://api.elasticemail.com/v2/';

  /**
   * Returns the API uri.
   * 
   * @return string
   */
  public function get()
  {
    return $this->apiUri;
  }

  /**
   * Override the API uri.
   *
   * @param  string  $apiUri
   * @return void
   */
  public function set($apiUri)
  {
    $this->apiUri = $apiUri;
  }

}