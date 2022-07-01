<?php

namespace App\Repository;

use App\Entity\Saison;
use App\Form\Model\Filtre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Form;

/**
 * @method Saison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Saison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Saison[]    findAll()
 * @method Saison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Saison::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Saison $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Saison $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // public function findByFiltersSaison()
    // {
    //     // $filtre = new Filtre();
    //     // $filtre = $form->getData();

    //     $qb = $this->createQueryBuilder('s');
    //     $qb->select('s.annee');
    //     // $qb->addOrderBy('j.nom', 'ASC')
    //     //     ->addOrderBy('j.prenom', 'ASC');
    //     // $qb->orderBy('j.nb_but', 'DESC');
    //     // $qb->join('j.posteId', 'p');
    //     $qb->join('s.joueurs', 'j');

    //     // $qb->addSelect('s.annee');
    //     // $qb->Where('j.saisons = 3');
    //     // $qb->Where('s.id = 3');

    //     // if ($form->isSubmitted()) {

    //     //     if ($filtre->getRecherche() != null && $filtre->getRecherche() != "") {
    //     //         $qb->andWhere('j.prenom LIKE :recherche');
    //     //         $qb->setParameter('recherche', '%' . $filtre->getRecherche() . '%');
    //     //     }

    //     //     if ($filtre->getSaison() != null) {
    //     //         $qb->andWhere('j.id = :joeur');
    //     //         $qb->setParameter('saison', $filtre->getSaison());
    //     //     }
    //     // }

    //     // return $qb->getQuery()->getParameter();
    //     return $qb->getQuery()->getResult();
    // }
    public function findBySaison()
    {

        $qb = $this->createQueryBuilder('s');
        $qb->select('s');
        // $qb->addOrderBy('j.nom', 'ASC');
        //     ->addOrderBy('j.prenom', 'ASC');
        // $qb->orderBy('j.nb_but', 'DESC');
        // $qb->join('j.posteId', 'p');
        $qb->join('s.joueurs', 'j');

        // $qb->addSelect('s.annee');

        // $qb->addOrderBy('s.annee', 'DESC');
        // $qb->Where('s.joueurs = j.saisons');

        // return $qb->getQuery()->getParameter();
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Saison[] Returns an array of Saison objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Saison
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
