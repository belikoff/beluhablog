<?php

namespace Beluha\BlogBundle\Repository;

/**
 * AuthorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuthorRepository extends \Doctrine\ORM\EntityRepository
{
    private function getQueryBilder()
    {
        $em = $this->getEntityManager();
        $qb = $em->getRepository('BeluhaBlogBundle:Author')->createQueryBuilder('a');
        return $qb;
    }    
    
    /**
     * Find first Author
     * 
     * @return Author
     */
    public function findFirst()
    {
        $qb =  $this->getQueryBilder()
                ->orderBy('a.id', 'asc')
                ->setMaxResults(1);
        
        return $qb->getQuery()->getSingleResult();
    }    
}
