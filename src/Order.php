<?php


class Order
{
    /**
     * @var int
     */
    public $amount = 0;

    /**
     * @var PaymentGateway
     */
    protected $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}