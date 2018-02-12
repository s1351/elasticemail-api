<?php

namespace s1351\ElasticEmailAPI;

use s1351\ElasticEmailAPI\Client\Auth;
use s1351\ElasticEmailAPI\Client\Uri;
use s1351\ElasticEmailAPI\Actions\Contact as ContactAction;
use s1351\ElasticEmailAPI\Actions\ContactList as ContactListAction;
use s1351\ElasticEmailAPI\Actions\SMS as SMSAction;

class ElasticEmail
{
  private $auth;
  private $uri;

  /**
   * Construct class.
   *
   * @param  string  $apiKey
   * @param  string  $apiUri
   * @return void
   */
  public function __construct($apiKey, $apiUri = null)
  {
    // Set authentication.
    $this->auth = new Auth;
    $this->auth->set($apiKey);

    // Set uri.
    $this->uri = new Uri;
    if ($apiUri) {
      $this->uri->set($apiUri);
    }
  }

  /**
   * Access contact actions.
   * 
   * @return ContactAction
   */
  public function contact()
  {
    return new ContactAction($this->auth, $this->uri);
  }

  /**
   * Access contact list actions.
   * 
   * @return ContactListAction
   */
  public function contactList()
  {
    return new ContactListAction($this->auth, $this->uri);
  }

  /**
   * Access SMS actions.
   * 
   * @return SMSAction
   */
  public function sms()
  {
    return new SMSAction($this->auth, $this->uri);
  }

}