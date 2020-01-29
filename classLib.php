<?php

namespace classLib;

use DateTime;

class author
{

    var $name;
    var $gender;
    var $nationality;
    var $age;
    var $phone;
    var $email;
    var $skype;

    // calculate age function, to avoid changing it every year
    private function calc_age($birthyear)
    {
        $date = new DateTime($birthyear);
        $now = new DateTime();
        $interval = $now->diff($date);
        $this->age = $interval->y;
    }
    //Methods

    //set methods
    function set_name($new_name)
    {
        $this->name = $new_name;
    }

    //more simple function for setting calculated age, when using the form
    function set_age_calc($new_age)
    {
        $this->age = $new_age;
    }

    function set_age($new_age)
    {
        $this->calc_age($new_age);
    }

    function set_nationality($new_nationality)
    {
        $this->nationality = $new_nationality;
    }

    function set_gender($new_gender)
    {
        $this->gender = $new_gender;
    }

    function set_phone($new_phone)
    {
        $this->phone = $new_phone;
    }

    function set_email($new_email)
    {
        $this->email = $new_email;
    }

    function set_skype($new_skype)
    {
        $this->skype = $new_skype;
    }

    //get moethods
    function get_name()
    {
        return $this->name;
    }

    function get_age()
    {
        return $this->age;
    }

    function get_nationality()
    {
        return $this->nationality;
    }

    function get_gender()
    {
        return $this->gender;
    }

    function get_phone()
    {
        return $this->phone;
    }

    function get_email()
    {
        return $this->email;
    }

    function get_skype()
    {
        return $this->skype;
    }
}

class templateParser
{

    var $output;

//getting a template file, in this case template.html
    function __construct($templateFile)
    {

        if (file_exists($templateFile)) {
            $this->output = file_get_contents($templateFile);
        }


    }

//function used for parsing tags and replacing content
    function parseTemplate($list)
    {

        if ((count($list) > 0) && (is_array($list))) {


            foreach ($list as $key => $item) {
                //checking if tag value is another php page and placing that page with the rest of the content
                if (file_exists($item)) {

                    $item = $this->parseFile($item);
                    $this->output = str_replace("{" . $key . "}", $item[0], $this->output);
                    return $item[1];
                } else
                    $this->output = str_replace("{" . $key . "}", $item, $this->output);

            }

        }


    }

    function parseFile($file)
    {

        global $info;

        ob_start();
//part unique to form.php handeling, if user changes content in a form, it returns the changed values to index.php
        include($file);
        if ($info != null) {
            $author = new \classLib\author();

            $author->set_name($info['name']);
            $author->set_age($info["age"]);
            $author->set_nationality($info["nation"]);
            $author->set_gender($info["gender"]);
            $author->set_phone($info["phone"]);
            $author->set_email($info["email"]);
            $author->set_skype($info["skype"]);

        } else {
            $author = null;
        }

        $content = ob_get_contents();
        ob_end_clean();
        //returning an array, so it can return author and parse content in parseTemplate
        return array($content, $author);

    }

    function display()
    {

        return $this->output;

    }

}

?>