<?php

function encode_id($id = NULL){
  $id = base64_encode($id);
  $id = urlencode($id);
  return $id;
}

function decode_id($id = NULL){
  $id = urldecode($id);
  $id = base64_decode($id);
  return $id;
}

function _push_file($path, $name)
{
  echo $path;
  // make sure it's a file before doing anything!
  if(is_file($path))
  {
      // required for IE
      if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

      // get the file mime type using the file extension
      $this->load->helper('file');

      $mime = get_mime_by_extension($path);

      // Build the headers to push out the file properly.
      header('Pragma: public');     // required
      header('Expires: 0');         // no cache
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
      header('Cache-Control: private',false);
      header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
      header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: '.filesize($path)); // provide file size
      header('Connection: close');
      readfile($path); // push it out
      exit();
  } else {
      echo "no file";
  }
}

function get_slot_by_id($id = NULL)
  {
    switch($id)
    {
      case '1': echo "12:00 AM - 12:30 AM";
      break;
      case '2': echo "12:30 AM - 01:00 AM";
      break;
      case '3': echo "01:00 AM - 01:30 AM";
      break;
      case '4': echo "01:30 AM - 02:00 AM";
      break;
      case '5': echo "02:00 AM - 02:30 AM";
      break;
      case '6': echo "02:30 AM - 03:00 AM";
      break;
      case '7': echo "03:00 AM - 03:30 AM";
      break;
      case '8': echo "03:30 AM - 04:00 AM";
      break;
      case '9': echo "04:00 AM - 04:30 AM";
      break;
      case '10': echo "04:30 AM - 05:00 AM";
      break;
      case '11': echo "05:00 AM - 05:30 AM";
      break;
      case '12': echo "05:30 AM - 06:00 AM";
      break;
      case '13': echo "06:00 AM - 06:30 AM";
      break;
      case '14': echo "06:30 AM - 07:00 AM";
      break;
      case '15': echo "07:00 AM - 07:30 AM";
      break;
      case '16': echo "07:30 AM - 08:00 AM";
      break;
      case '17': echo "08:00 AM - 08:30 AM";
      break;
      case '18': echo "08:30 AM - 09:00 AM";
      break;
      case '19': echo "09:00 AM 09:30 AM";
      break;
      case '20': echo "09:30 AM - 10:00 AM";
      break;
      case '21': echo "10:00 AM - 10:30 AM";
      break;
      case '22': echo "10:30 AM - 11:00 AM";
      break;
      case '23': echo "11:00 AM - 11:30 AM";
      break;
      case '24': echo "11:30 AM - 12:00 PM";
      break;
      case '25': echo "12:00 PM - 12:30 PM";
      break;
      case '26': echo "12:30 PM - 01:00 PM";
      break;
      case '27': echo "01:00 PM - 01:30 PM";
      break;
      case '28': echo "01:30 PM - 02:00 PM";
      break;
      case '29': echo "02:00 PM - 02:30 PM";
      break;
      case '30': echo "02:30 PM - 03:00 PM";
      break;
      case '31': echo "03:00 PM - 03:30 PM";
      break;
      case '32': echo "03:30 PM - 04:00 PM";
      break;
      case '33': echo "04:00 PM - 04:30 PM";
      break;
      case '34': echo "04:30 PM - 05:00 PM";
      break;
      case '35': echo "05:00 PM - 05:30 PM";
      break;
      case '36': echo "05:30 PM - 06:00 PM";
      break;
      case '37': echo "06:00 PM - 06:30 PM";
      break;
      case '38': echo "06:30 PM - 07:00 PM";
      break;
      case '39': echo "07:00 PM - 07:30 PM";
      break;
      case '40': echo "07:30 PM - 08:00 PM";
      break;
      case '41': echo "08:00 PM - 08:30 PM";
      break;
      case '42': echo "08:30 PM - 09:00 PM";
      break;
      case '43': echo "09:00 PM - 09:30 PM";
      break;
      case '44': echo "09:30 PM - 10:00 PM";
      break;
      case '45': echo "10:00 PM - 10:30 PM";
      break;
      case '46': echo "10:30 PM - 11:00 PM";
      break;
      case '47': echo "11:00 PM - 11:30 PM";
      break;
      case '48': echo "11:30 PM - 12:00 AM";
      break;
      default: echo "";
      break;
    }
  }