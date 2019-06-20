<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'thankyoupage',  'editmeascustomer', 'reserveforocustomer', 'reservefornewcustomer',  'logoutcustomer','logincustomer', 'registercustomer','reservationpage', 'viewrooms', 'saveeditCustomer', '/editCustomer/{ID}','/DelCustomer/{ID}', 'AddCustomer', 'saveeditbooking',  '/updatebooking/{ID}', '/Delbooking/{ID}', 'saveeditplist', 'Addplist',  'addhotel','edithotel','updateimage','updatetype','Addtype','Deltype/{ID}','updatecapacity','Addcapacity','Delcapacity/{ID}','Addroom','/Delroom/{ID}','/editroom/{ID}','saveeditRoom','updateroomimage'
    ];
}
