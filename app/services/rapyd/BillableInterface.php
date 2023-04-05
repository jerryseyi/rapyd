<?php

namespace App\services\rapyd;

interface BillableInterface
{

    /** Invoice the billable entity.
     *
     * @return void
     */
    public function invoice(): void;


    /**
     * Get all the invoices belonging to an account.
     *
     * @return array
     */
    public function invoices(): array;

    /**
     * Get a specific invoice.
     *
     * @param $id
     * @return void
     */
    public function invoiceByID($id): void;

    /**
     * Get rapyd ID for the entity.
     *
     * @return string
     */
    public function getID(): string;

    /**
     * Set rapyd ID for an entity.
     *
     * @return void
     */
    public function setID(): void;

    /**
     * Get the last four digit of a card.
     *
     * @return string
     */
    public function getCardLastFourDigits(): string;

    /**
     * Set the last four digit of a card.
     *
     * @param $digit
     * @return mixed
     */
    public function setCardLastFourDigits($digit): mixed;
}
