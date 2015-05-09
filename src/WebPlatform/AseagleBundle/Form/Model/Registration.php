<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 8/2/14
 * Time: 12:25 PM
 */

namespace WebPlatform\AseagleBundle\Form\Model;
use Symfony\Component\Validator\Constraints as Assert;
use WebPlatform\AseagleBundle\Entity\User;

class Registration
{
    /**
     * @Assert\Type(type="Acme\AccountBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}