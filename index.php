<?php


include("classLib.php");


$tp = new \classLib\templateParser("template.html");

$info = array(
    'name' => "Adomas Dambrauskas",
    "age" => "1995-12-07",
    "nation" => "Lithuanian",
    "gender" => "Male",
    "phone" => 864590557,
    "email" => "adomas.dambrauskas@gmail.com",
    "skype" => "adomas1237");
//creating an object
$author = new \classLib\author();
//setting values
$author->set_name($info['name']);
$author->set_age($info['age']);
$author->set_nationality($info['nation']);
$author->set_gender($info['gender']);
$author->set_phone($info['phone']);
$author->set_email($info['email']);
$author->set_skype($info['skype']);
//getting values
$content = array(
    'name' => $name = $author->get_name(),
    "age" => $age = $author->get_age(),
    "nation" => $nation = $author->get_nationality(),
    "gender" => $gender = $author->get_gender(),
    "phone" => $phone = $author->get_phone(),
    "email" => $email = $author->get_email(),
    "skype" => $skype = $author->get_skype(),
    "form.php" => 'form.php');
//using first parseTemplate function call to check if there is changed information (form.php)
$item = $tp->parseTemplate($content);


if ($item != null) {

    $author->set_name($item->name);
    $author->set_age_calc($item->age);
    $author->set_nationality($item->nationality);
    $author->set_gender($item->gender);
    $author->set_phone($item->phone);
    $author->set_email($item->email);
    $author->set_skype($item->skype);

    $content = array(
        'name' => $author->get_name(),
        "age" => $author->get_age(),
        "nation" => $author->get_nationality(),
        "gender" => $author->get_gender(),
        "phone" => $author->get_phone(),
        "email" => $author->get_email(),
        "skype" => $author->get_skype(),
        "form.php" => 'form.php');
    //wiping the current template with new values
    $tp = new \classLib\templateParser("template.html");
    $tp->parseTemplate($content);
}


// display generated page

echo $tp->display();

?>