# FastPHPFramework

##Requirements

* PHP 5
* PDO

## Intro 

This is a blueprint of FastPHPFramework.
Its purpose is rapid php development and its also a good starting point to understand MCV. 
This version contains 

1 URL Routing 
2 MVC 
3 Template engine 
4 PHPMailer 

## Example define model

This model should reflect your DB Table, notice that id must be a auto_increment in MySQL
or serial in Postgres. 

```
<?php

class contacts extends BaseApp
{

    public $id="";
    public $firstname="";
    public $lastname="";
    public $mail="";
    
    function getPrimary(){
        return "id";
    }

}
```


With this model, you have now basic CRUD Methods (Create, Read, Update, Delete) 
on you table contacts.

## Example (using model)

```

# create a new contact
$new_contact = new contacts();
$new_contact->firstname = "andreas";
$new_contact->save();

# get a list of all users with given properties
$list = $contact->get_list(array("firstname" => "andreas",
                                 "lastname" => "beder"));
foreach($list as $obj)
{
    # updateing a list is very comfortable
    $obj->email="andreas@codejungle.org";
    $obj->save();

    # deleting is easy as well
    $obj->del($obj->id);
}
```


## Routing example 
see routing.php

```
$router->map( 'GET', '/customer/[i:id]/', 'CustomerController#getData' );
```

## Controller example


```
<?php

/**
 * Class CustomerControlelr
 */
class CustomerControlelr extends BaseController
{
    
    function getData($request){

	$contact = new Contact();
	$contact = $contact->get($request['id']);
	$this->assign("contact", $contact);
	$this->render("contact.php");
    }

}
```


##Thanks to

* Jakob Oberhummer
* Andi Mery 


##Projects using FastPHPFramework 

* [Das merken die nie](http://dasmerkendienie.com/)
* [Fresha Online Shop](http://fresha.moving-bytes.at)
* [Video Platform](http://video.codejungle.org)
* [Stock Market Game (old version)](http://boerse.codejungle.org/)

