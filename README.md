# README #

This will help to quick start google plus API integrtion with codeigniter.


### Installation ###

#Direct Installation#

1. Download the repository in www directory
2. In the root directory apache configuration file is provided. Copy this file in apache config folder and restart the server.
3. Change the google api configuration options in `vim application/config/googleplus.php` 
4. Set apache own & directory permission to directory
5. Add host entry for googlecodeigniter.com
6. You are ready to authorize and post moment.

#Setup only google plus#
1. Download the repository in www directory
2. In the root directory apache configuration file is provided. Copy this file in apache config folder and restart the server.
3. Copy the `cp -r application/third_party/Google /yourpath`
4. Copy library file from `cp application/libraries/Googleplus.php application/libraries/`
5. Copy config file from `cp application/config/googleplus.php application/config/`
6. Change the google api configuration options in `vim application/config/googleplus.php` 
7. Add `$config['encryption_key'] = Your key` in `vim application/config/config.php` to enable session library 
8. For google plus intialization & posting moment: `vim application/controllers/welcome.php`
9. You can then load the library like this `$this->load->library('googleplus');`
  
  
Read the full API docs on the Google+ website http://developers.google.com/+/api

Uses the Google APIs Client Library for PHP https://github.com/google/google-api-php-client

### Google Registration ###
1. https://console.developers.google.com
2. Create New Project
3. APIs & Auth->APIs ![Register API](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/3.png)
4. APIs & Auth->Credentials->Create new Client ID ![Client ID](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/4.png)
5. APIs & Auth->Credentials->Create New Key->Browser key![Browser Key](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/5.png)
6. APIs & Auth->Consent Screen(This is very imporant step. As it will give you authentication error)
   * Set Email Address
   * Product Name
![Register API](https://github.com/rajeshujade/google-plus-api-codeigniter-starter/blob/master/screenshot/6.png)
