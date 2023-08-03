<?php
namespace Admin\Grid\Api\Data;

interface SubMenuInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const ADDRESS = 'address';
    
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getId();

    /**
     * Set EntityId.
     */
    public function setId($id);

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getName();

    /**
     * Set Title.
     */
    public function setName($name);

    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getEmail();

    /**
     * Set Content.
     */
    public function setEmail($email);

    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    public function getAddress();

    /**
     * Set PublishDate.
     */
    public function setAddress($address);

}