<?php

namespace s1351\ElasticEmailAPI\Client;

use Exception;

class Curl
{
  /**
   * Curl options array.
   *
   * @var array
   */
  private $curlOptions;

  /**
   * Containers.
   *
   * @var
   */
  private $auth;
  private $uri;
  private $url;
  private $data;
  private $method;

  /**
   * Construct class.
   * 
   * @param  Auth $auth
   * @param  Uri  $uri
   * @return void
   */
  public function __construct($auth, $uri)
  {
    $this->auth = $auth;
    $this->uri  = $uri;
  }

  /**
   * Set data.
   * 
   * @param  array  $data
   * @return void
   */
  public function setData(array $data)
  {
    $this->data = $data;
  }

  /**
   * Set method.
   * 
   * @param  string  $method
   * @return void
   */
  public function setMethod(string $method)
  {
    $this->method = $method;
  }

  /**
   * Set url.
   * 
   * @param  string $url
   * @return void
   */
  public function setUrl(string $url)
  {
    $this->url = $url;
  }

  /**
   * Create a request,
   *
   * @param  string  $url
   * @param  array   $data
   * @param  string  $method
   * @return
   */
  public function request()
  {
    $curl = curl_init();
    curl_setopt_array($curl, $this->getCurlOptions());

    try {
      $result = json_decode(curl_exec($curl), true);

      if ($result['success']) {
        if (isset($result['data'])) {
          return $result['data'];
        } else {
          return true;
          
        }
      } else {
        if (isset($result['error'])) {
          return $result['error'];
        } else {
          return false;
        }
      }
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  /**
   * Get curl options.
   *
   * @return array
   */
  private function getCurlOptions()
  {
    if (!$this->curlOptions) {
      $this->setCurlOptions();
    }

    return $this->curlOptions;
  }

  /**
   * Set curl options.
   *
   * @return void
   */
  private function setCurlOptions()
  {
    $this->curlOptions = [
      CURLOPT_URL             => $this->uri->get() . $this->url,
      CURLOPT_RETURNTRANSFER  => true,
      CURLOPT_HTTPHEADER      => ['Content-Type: application/json'],
      CURLOPT_SSL_VERIFYPEER  => false,
    ];

    $this->data['apikey'] = $this->auth->get();

    if ($this->method === 'POST') {
      $this->curlOptions[CURLOPT_POST]       = true;
      $this->curlOptions[CURLOPT_POSTFIELDS] = json_encode($this->data);
    } else {
      $this->curlOptions[CURLOPT_POST]       = false;
      $this->curlOptions[CURLOPT_URL]       .= '?' . http_build_query($this->data);
    }
  }

}