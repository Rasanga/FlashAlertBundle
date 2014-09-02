<?php
/**
 * AbstractAlertService.php
 * Definition of class AbstractAlertService
 *
 * Created 31/08/14 07:20
 *
 * @author Rasanga Perera <rasangaperera@gmail.com>
 * Copyright (c) 2014, The MIT License (MIT)
 */

namespace Ras\Bundle\FlashAlertBundle\Service;


use Symfony\Component\HttpFoundation\Session\Session;

abstract class AbstractAlertService
{

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

} 