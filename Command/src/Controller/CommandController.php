<?php

namespace App\Controller;
use App\Entity\Command;
use App\Repository\CommandRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommandController extends AbstractController
{
    private CommandRepository $repository;
    public function __construct(CommandRepository $repository){
        $this->repository=$repository;
    }


    #[Route('/command', name: 'app_command')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CommandController.php',
        ]);
    }

    #[Route('/CreateCommand',name:'app_command_create',methods:'POST')]
    public function CreateCommad(Request $req)
    {
        $requestData=json_decode($req->getContent(),true);
        if($requestData==null){ return new JsonResponse(['error'=>'Invalid JSON data'],400);}
        else{
            $command=new Command();
            $uuid=Uuid::uuid4();
            $command->setId($uuid->toString());
            $command->setProductId($requestData['productId']);
            $command->setQuantity($requestData['quantity']);
            $command->setAdress($requestData['price']);
            $command->setPhone($requestData['phone']);
            $response=$this->repository->CreateCommande($command);
            if($response['response']=="data inserted succeffly"){   return $this->json($response, 200); }
            else if($response['response']=="Data insert failed"){   return $this->json($response, 400); }
            return $this->json($response, 500); 
        }
    }

}
