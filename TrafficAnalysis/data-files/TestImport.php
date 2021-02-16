<?php

function admin_import() {

  if (isset($_REQUEST['upload'])) {
    $ok = true;
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen($file, "r");
    if ($file == NULL) {
      error(_('Please select a file to import'));
      redirect(page_link_to('admin_export'));
    }
    else {
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
          $date_name = $filesop[0];
          $time_name = $filesop[1];
          $count_name = $filesop[2];
          
// example error handling. We can add more as required for the database.

        if ( strlen($email) && preg_match("/^[a-z0-9._+-]{1,64}@(?:[a-z0-9-]{1,63}\.){1,125}[a-z]{2,63}$/", $mail) > 0) {
          if (! check_email($email)) {
            $ok = false;
            $msg .= error(_("E-mail address is not correct."), true);
          }
        }
// error handling for password        
        if (strlen($password) >= MIN_PASSWORD_LENGTH) {
            $ok = true;
          } else {
            $ok = false;
            $msg .= error(sprintf(_("Your password is too short (please use at least %s characters)."), MIN_PASSWORD_LENGTH), true);
        }
 // If the tests pass we can insert it into the database.       
        if ($ok) {
          $sql = sql_query("
            INSERT INTO `User` SET
            `Date Name`='" . sql_escape($date_name) . "',
            `Time Name`='" . sql_escape($time_name) . "',
            `Count Name`='" . sql_escape($count_name) . "';
			
			
        }
      }

      if ($sql) {
        success(_("You database has imported successfully!"));
        redirect(page_link_to('admin_export'));
      } else {
        error(_('Sorry! There is some problem in the import file.'));
        redirect(page_link_to('admin_export'));
        }
    }
  }
//form_submit($name, $label) Renders the submit button of a form
//form_file($name, $label) Renders a form file box

 return page_with_title("Import Data", array(
   msg(),
  div('row', array(
          div('col-md-12', array(
              form(array(
                form_file('csv_file', _("Import user data from a csv file")),
                form_submit('upload', _("Import"))
              ))
          ))
      ))
  ));
}
?>