<?php

namespace App\Repository;
use App\Entity\Command;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
class CommandRepository extends ServiceEntityRepository
{
    private $doctrine;
    private $logger;
    public function __construct(ManagerRegistry $doctrine,LoggerInterface $logger)
    {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
    }
    public function connect()
    {
        try {
            /** @var Connection $connection */
            $connection = $this->doctrine->getConnection();
            return $connection;
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function getCommand(Command $command)
    {
        
    }
    public function CreateCommande(Command $command)
    {
        $conn=$this->connect();
        if($conn)
        {
            $query="INSERT Into command(id,product_id,quantity,price,adress,phone)values(:id,:productid,:quantity,:price,:adress,:phone)";
            $params=[
                'id'=>$command->getId(),
                'productid'=>$command->getProductId(),
                'price'=>$command->getAdress(),
                'quantity'=>$command->getQuantity(),
                'adress'=>$command->getAdress(),
                'phone'=>$command->getPhone()
            ];
            try{
                $conn->executeStatement($query, $params);
                return ['response'=>'data inserted succeffly'];
            }catch(\Exception $e){
                return ['response'=>$e];
            }
        }else{
            return['response'=>'Database connection failed'];
        }
    }
}
