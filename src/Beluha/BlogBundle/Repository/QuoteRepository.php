<?php

namespace Beluha\BlogBundle\Repository;
use Doctrine\ORM\Query;


/**
 * QuoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuoteRepository extends \Doctrine\ORM\EntityRepository
{
    public function getRandom($id = null)
    {
        $quotes = $this->getIdArray();
        $quoteKey = array_rand($quotes);
        if( !is_null($id) and $quotes[$quoteKey] == $id){
            while($quotes[$quoteKey] == $id){
                $quoteKey = array_rand($quotes);                
            }
        }
        $randonQuote = $this->find($quotes[$quoteKey]);
        return $randonQuote;
        
    }

    private function getQueryBuider()
    {
        $em = $this->getEntityManager();
        $qb = $em->getRepository('BeluhaBlogBundle:Quote')->createQueryBuilder('q');
        return $qb;
    }
    private function getIdArray()
    {
        $quotes = $this->getQueryBuider()
            ->select('q')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        

        $idArray = [];
        foreach ($quotes as $quote){
            $idArray[] = $quote['id'];
        }
        return $idArray;
    }
}
