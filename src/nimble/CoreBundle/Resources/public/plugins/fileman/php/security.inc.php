<?php
/*
  RoxyFileman - web based file manager. Ready to use with CKEditor, TinyMCE. 
  Can be easily integrated with any other WYSIWYG editor or CMS.

  Copyright (C) 2013, RoxyFileman.com - Lyubomir Arsov. All rights reserved.
  For licensing, see LICENSE.txt or http://RoxyFileman.com/license

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

  Contact: Lyubomir Arsov, liubo (at) web-lobby.com
*/
function checkAccess($action){
  if(!session_id())
    session_start();

  $strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';

  session_write_close();

  $url = 'https://www.kiwi-tests.cz/admin';
  $handle = curl_init($url);

  curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt( $handle, CURLOPT_COOKIE, $strCookie );

  // Get the HTML or whatever is linked in $url.
  $response = curl_exec($handle);

  // Check for 404 (file not found).
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

  curl_close($handle);

  if($httpCode != 200)
    exit();
}

?>