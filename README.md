# FastPHPFramework aka FPF

##Requirements

* PHP 5
* PDO

## Intro 

This is a blueprint of FPF.
Its purpose is rapid php development and its also a nice starting point to understand MCV. 

This version contains only the nessary stuff:

1. URL Routing 
2. MVC 
3. Template engine 
4. PHPMailer 

Other versions of FPF contain already an authentication layer (with FB), Mailchimp, PDF Generation, Payment Providers and much more. 
We are still looking for a nice way, how we can plug in play such function easyly and provide it to you as 
installation package.


## Model

The model reflect your DB table. Please note that the primary, id in this case must be a auto_increment in MySQL or serial in Postgres. Of cause you can extend this model with your own Queries, but note, with
this in place, you have already basic CRUD (Create, Read, Update, Delete)  methods on you table.

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


## Now how to use this model?

```

# create a new contact
$new_contact = new contacts();
$new_contact->firstname = "andreas";
$new_contact->lastname = "beder";
$new_contact->save();

# get a list of all users with given properties
$list = $contact->get_list(array("firstname" => "andreas",
                                 "lastname" => "beder"));
foreach($list as $contact)
{
    # updateing a entry is very comfortable
    $contact->email="andreas@codejungle.org";
    $contact->save();

    # deleting is easy as well
    $contact->del($contact->id);
}
```


## URL - Routing
Here we define which url (/customer/ has which parameter (id) and method (GET). 
Also validation is included i stands for integar in example. 
And last but not least the Object CustomerController and method getData() which
is resbonsible for this request.

```
$router->map( 'GET', '/customer/[i:id]/', 'CustomerController#getData' );
```

## Controller 

The Controller holds everything together, 
useally we get some parameters (in this example the id of a given contact),
make some db queries on our model contacts and render some template out. 


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

