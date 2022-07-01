<?php

namespace App\Repository;

use App\Entity\Joueur;
use App\Form\Model\Filtre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Form;

/**
 * @method Joueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joueur[]    findAll()
 * @method Joueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joueur::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Joueur $entity, bool $flush = true): void
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
    public function remove(Joueur $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findByFiltersNom(Form $form)
    {
        $filtre = new Filtre();
        $filtre = $form->getData();

        $qb = $this->createQueryBuilder('j');
        $qb->select('j');
        // $qb->addOrderBy('j.nom', 'ASC');
        //     ->addOrderBy('j.prenom', 'ASC');
        // $qb->orderBy('j.nb_but', 'DESC');
        // $qb->join('j.posteId', 'p');
        $qb->join('j.saisons', 's');

        // $qb->addSelect('s.annee');

        // $qb->addOrderBy('s.annee', 'DESC');
        // $qb->Where('s.joueurs = j.saisons');

        // $qb->Where('s.annee = 2021/2022');
        // $qb->Where('s.id = 3');

        if ($form->isSubmitted()) {

            if ($filtre->getRecherche() != null && $filtre->getRecherche() != "") {
                $qb->andWhere('j.prenom LIKE :recherche');
                $qb->setParameter('recherche', '%' . $filtre->getRecherche() . '%');
            }

            if ($filtre->getSaison() != null) {
                $qb->andWhere('s.id = :saison');
                $qb->setParameter('saison', $filtre->getSaison());
            }
        }

        // return $qb->getQuery()->getParameter();
        return $qb->getQuery()->getResult();
    }

    public function findByFiltersNomInner()
    {
        $qb = $this->createQueryBuilder('j');
        $qb->select('j');
        // $qb->orderBy('j.nb_but', 'DESC');
        $qb->join('j.saisons', 's');
        // $qb->join('j.saisons', 's', 'WITH', 's.joueurs = 2021/2022');


        // $qb->addSelect('s.annee');
        // $qb->where('s.annee = 2021/2022');
        $qb->where('s.annee = 2021/2022');


        // return $qb->getQuery()->getParameter();
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Joueur[] Returns an array of Joueur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Joueur
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
