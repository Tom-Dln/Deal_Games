<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ItemVoter extends Voter
{
    public const EDIT = 'ITEM_EDIT';
    public const DELETE = 'ITEM_DELETE';
    public const ADD = 'ITEM_ADD';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $item): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::EDIT, self::DELETE, self::ADD])
            && $item instanceof \App\Entity\Item;
    }

    protected function voteOnAttribute(string $attribute, $item, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::EDIT:
                return $user === $item->getOwner();
                break;
            case self::DELETE:
                return $user === $item->getOwner();
                break;
            case self::ADD:
                return $user === $item->getOwner();
                break;
        }

        return false;
    }
}
