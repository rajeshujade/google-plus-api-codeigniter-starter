# README #

This will help to quick start google plus API integrtion with codeigniter.


### Installation ###

#Direct Installation#

1. Download the repository in www directory
2. In the root directory apache configuration file is provided. Copy this file in apache config folder and restart the server.
3. Change the google api configuration options in `vim application/config/googleplus.php` 
4. Set apache owner & directory permission to directory
5. Add host entry for googlecodeigniter.com
6. You are ready to authorize and post moment.

#Setup only google plus#
1. Download the repository in www directory
2. Copy the Google client library `cp -r application/third_party/Google /yourpath`
3. Copy library file from `cp application/libraries/Googleplus.php application/libraries/`
4. Copy config file from `cp application/config/googleplus.php application/config/`
5. Change the google api configuration options in `vim application/config/googleplus.php` 
6. Add `$config['encryption_key'] = Your key` in `vim application/config/config.php` to enable session library.
7. For google plus intialization & posting moment Check `vim application/controllers/welcome.php` file.
8. You can then load the library like this `$this->load->library('googleplus');`
  
  
Read the full API docs on the Google+ website http://developers.google.com/+/api

Uses the Google APIs Client Library for PHP https://github.com/google/google-api-php-client

### Google Registration ###
1. https://console.developers.google.com

2. Create New Project

3. To get `Google+ API` Access go to: APIs & Auth->APIs 

![Register API](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/3.png)

4. To Get `client_id & client_secret` go to: APIs & Auth->Credentials->Create new Client ID 

![Client ID](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/4.png)

5. To Get `api_key` go to: APIs & Auth->Credentials->Create New Key->Browser key

![Browser Key](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/5.png)

6. To Get `application_name` go to: APIs & Auth->Consent Screen(This is very imporant step. As it will give you authentication error)
   * Set Email Address
   * Product Name

![Register API](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/6.png)
