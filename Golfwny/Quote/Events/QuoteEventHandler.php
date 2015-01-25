<?php namespace Quote\Events;

use Quote\Mailers\AdminMailer,
    Quote\Mailers\CustomerMailer;

class QuoteEventHandler {

    protected $adminEmail;
    protected $customerEmail;

    public function __construct(CustomerMailer $customerMailer,
            AdminMailer $adminMailer)
    {
        $this->adminEmail = $adminMailer;
        $this->customerEmail = $customerMailer;
    }

    public function onCalculate($quote)
    {
        # code...
    }

    public function onCreate($quote)
    {
        // Send the confirmation email to the customer
        $this->customerEmail->submitted($quote);

        // Send the email to the admins
        $this->adminEmail->newQuote($quote);
    }

    public function onDelete($quote)
    {
        //
    }

    public function onStatusChange($quote)
    {
        # code...
    }

    public function onUpdate($quote)
    {
        //
    }

}