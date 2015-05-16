#test1

##About
This is test tasks.

###1. TransformArray.php:

Array such view with data:

    $data = array(
    array( 'x' => '1', 'y' => '1', 'z' => '1' ),
    ...
    array( 'x' => '99', 'y' => '99', 'z' => '99' )
    );
TransformArray.php allow transform array in such view:

    $data = array(
    'x' => array('1', ..., '99'),
    'y' => array('1', ..., '99'),
    'z' => array('1', ..., '99')
    );

###2. FilterArray.php
Remove duplicates from an array of the form.

    $phone = array(
      array('number' => '3456', 'type' => 'mobile'), array('number' => '1234', 'type' => 'home'), array('number' => '1234', 'type' => 'work'), array('number' => '1234', 'type' => 'work'),
    );

###3. User

In the database there is a table with the user profile user_profile (id, name, surname, phone_number, birthday). It is necessary to realize the opportunity to view the history of changes in the user profile fields.
_Example:_

    $client->getHistory('phone_number');

_Result:_

    array(
    '2012-12-01 10:00:00' => '777-77-77',
    '2012-12-04 11:00:00' => '666-66-66' );
