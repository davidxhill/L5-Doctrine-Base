<?php
namespace App\Users\Repositories;

use App\Users\User;
use App\Repositories\DoctrineRepository;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

class DoctrineUser extends DoctrineRepository implements UserRepository
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var string
     */
    protected $class;

    /**
     * Create a new UserDoctrineRepository
     *
     * @param EntityManager $em
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->class = User::class;
    }

   /**
     * Add a new User_
     *
     * @param User $user
     * @return void
     */
    public function add(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}
