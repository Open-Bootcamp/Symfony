<?php
// src/Services/InitializationDatabase.php
namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

use App\Enum\DataBaseEnum;

use App\Entity\Subjects;

class InitializationDatabase
{
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function uploadDataInitial ()
    {
        $this->uploadDataListSubjects();
        return 'Initialized database';
    }

    public function uploadDataListSubjects()
    {
        $listSubjects = DataBaseEnum::getListSubjects();
        $subject_repo = $this->em->getRepository(Subjects::class);
        foreach ( $listSubjects as $item) {
            $subject = $subject_repo->findOneBy(array('code'=>$item['code']));
            $existSubject = ( $subject === NULL )? false : true ;
            if ( !$existSubject ) {
                $newSubject = new Subjects();
                $newSubject->setName($item['name']);
                $newSubject->setCode($item['code']);
                $newSubject->setCredects($item['credects']);
                $this->em->persist($newSubject);
                $this->em->flush();
            }
        }
    }
}