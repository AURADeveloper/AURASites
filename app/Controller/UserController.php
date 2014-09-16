<?php

class UserController extends AppController {

  /**
   * If user tries to access /user, redirect them to /user/login
   */
  public function index() {
    $this->redirect(array('action' => 'login'));
  }

  /**
   * Log the user into AURA Sites.
   * For the moment, this function has a special behaviour. The first person that logs into the
   * system will be registered as the administrator. All subsequent login's by any other user will
   * be rejected as as present, we just allow one admin to login and service the website.
   */
  public function login() {
    // Instantiate the Google Client
    $client = new Google_Client();
    $client->setApplicationName(Configure::read('Google.ApplicationName'));
    $client->setClientId(Configure::read('Google.ClientId'));
    $client->setClientSecret(Configure::read('Google.ClientSecret'));
    $client->setRedirectUri(Configure::read('Google.RedirectUrl'));
    $client->setScopes(array('email', 'profile'));
    //$client->setAccessType('offline');

    // Instantiate the Google OAuth2 Service
    $oauth2 = new Google_Service_Oauth2($client);

    // If we have a code back from the OAuth 2.0 flow,
    // we need to exchange that with the authenticate()
    // function. We store the resultant access token
    // bundle in the session, and redirect to ourself.
    if (isset($_REQUEST['code'])) {
      $client->authenticate($_REQUEST['code']);
      $this->Session->write('access_token', $client->getAccessToken());
      $this->redirect(Configure::read('Google.RedirectUrl'));
      return;
    }

    if ($this->Session->read('access_token')) {
      $client->setAccessToken($this->Session->read('access_token'));
    }

    // If we have an access token, we can make
    // requests, else we generate an authentication URL.
    if ($client->getAccessToken()) {
      $this->Session->write('access_token', $client->getAccessToken());
    } else {
      $authUrl = $client->createAuthUrl();
      $this->set('authUrl', $authUrl);
      return;
    }

    // At this stage, the user has logged in to some form of Google account
    // Now we need to decide what to do with this user. We will either redirect them
    // to the admin page, register them then redirect or deny their login attempt
    // (not a registered user).
    $user = $oauth2->userinfo->get();
    $this->User->id = $user['id'];
    $result = $this->User->find('count', array('conditions' => array('id' => $this->User->id)));

    // If the user has already registered, nothing else to do. Just redirect to admin dashboard
    if($result > 0) {
      $access_token = $this->Session->read('access_token');
      //$refresh_token = json_decode($access_token)->refresh_token;
      $db_user = $this->User->findById($user['id']);
      //$db_user['User']['refresh_token'] = $refresh_token;
      $this->User->save($db_user); // update the refresh token
      $this->Session->write('user', $db_user);
      $this->redirect(array('controller' => 'dashboard', 'admin' => true));
      return;
    }

    // No user found in our DB, is there an admin already registered for this client?
    // If not, register them as this is the behaviour for now. Otherwise, deny the request
    $result = $this->User->find('count', array('conditions' => array('client_id' => $this->client_id)));
    if($result == 0) {
      $access_token = $this->Session->read('access_token');
      //$refresh_token = json_decode($access_token)->refresh_token;
      $db_user = array('User' => array(
          'id' => $user['id'],
          'client_id' => $this->client_id,
          'role_id' => 1, // register as admin
          'name' => filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS),
          'email' => filter_var($user['email'], FILTER_SANITIZE_EMAIL),
          'link' => filter_var($user['link'], FILTER_VALIDATE_URL),
          'picture' => filter_var($user['picture'], FILTER_VALIDATE_URL)));

      // Save the user into our database
      if ($this->User->save($db_user)) {
        $this->Session->write('user', $db_user);
        $this->redirect(array('controller' => 'dashboard', 'admin' => true));
        return;
      } else { // There was a problem!
        $this->Session->setFlash("There was an error saving your profile.");
        return;
      }
    }

    // The final condition is that there is already an admin registered
    // Therefore we will deny this users sign on attempt
    $this->Session->setFlash("You are not permitted to access this application.");
    $this->Session->delete('access_token');
  }

  /**
   * Log the user out of AURA Sites.
   */
  public function logout() {
//    $client = new Google_Client();
//    $client->setApplicationName(Configure::read('Google.ApplicationName'));
//    $client->setClientId(Configure::read('Google.ClientId'));
//    $client->setClientSecret(Configure::read('Google.ClientSecret'));
//    $client->setRedirectUri(Configure::read('Google.RedirectUrl'));
//    $client->setScopes(array('email', 'profile'));
//
//    // Delete the Cached access token
//    if ($this->Session->read('access_token')) {
//      $client->revokeToken($this->Session->read('access_token'));
//      $this->Session->delete('access_token');
//    }

    if ($this->Session->delete('user')) {
      $this->Session->delete('access_token');
      // Inform the user what just happened
      $this->Session->setFlash("Your have successfully logged out of AURA Sites.");
    }

    // Redirect to login
    $this->redirect(array('controller' => 'user', 'action' => 'login'));
  }

}
