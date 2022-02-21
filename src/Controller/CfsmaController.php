<?php

namespace App\Controller;

use App\Entity\Compagnies;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotNull;

class CfsmaController extends AbstractController
{
    //  /**
    //  * @var ObjectManager
    //  */

    //  private $em;

    // public function __construct(ObjectManager $em)
    // {
    //   $this->em = $em;
    // }

     /**
     * @Route("/", name="index")
     */
    
    public function index()
    {
    return $this->render('users/pagedesmatiere.html.twig', [
    'controller_name' => 'CfsmaController'
    ]);
  }

    /**
     * @Route("/connexion", name="connexion")
     */

    public function connexion()
    {
      return $this->render('connexion.html.twig');

    }

  /**
   * @Route("/addUsers/", name="addUsers")
   */

    public function User()
    {
      return $this->render('users/addUser.html.twig');

    }

   /**
   * @Route("/addformateur/", name="addformateur")
   */

  public function formateur()
  {
    return $this->render('users/addformateur.html.twig');
  }

   /**
   * @Route("/addstagiaire/", name="addstagiaire")
   */

  public function stagiaire()
  {
    return $this->render('users/addstagiaire.html.twig');
  }

  /**
   * @Route("/addcompagnie/", name="addcompagnie")
   * @Route("/addcompagnie/{id}", name="addcompagnieEdit")
   * @return Response
   */

  public function ajoutecomp(Compagnies $compagnie = null,Request $request,ManagerRegistry $comp, EntityManagerInterface $manager): Response
  {  
    $compagnies = $comp->getRepository(Compagnies::class)->findAll();

    if(!$compagnie){
      $compagnie = new Compagnies;
    } 

    $form = $this->createFormBuilder($compagnie)
                  ->add('name', TextType::class, array('label' => false)) 
                  ->getForm();
                 
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$compagnie->getId()){
          $compagnie;
      }
      $manager->persist($compagnie);
      $manager->flush();
    }
    return $this->render('users/addcompagnie.html.twig', [
      'compagnies' =>  $compagnies,
      'formCompagnie' =>$form->createView(),
      'EditMode' =>  $compagnie->getId() !== null
    ]);
  }
  /**
  * @Route("/addcompagnie/delete/{id}", name="addcompagnieEdit")
  */

         
   /**
   * @Route("/addsection/", name="addsection")
   */

  public function section()
  {
    return $this->render('users/addsection.html.twig');
  }
   /**
   * @Route("/addfiliere/", name="addfiliere")
   */

  public function filiere()
  {
    return $this->render('users/addfiliere.html.twig');
  }

   /**
   * @Route("/addcohorte/", name="addcohorte")
   */

  public function cohorte()
  {
    return $this->render('users/addcohorte.html.twig');
  }

   /**
   * @Route("/addmatiere/", name="addmatiere")
   */

  public function matiere()
  {
    return $this->render('users/addmatiere.html.twig');
  }

   /**
   * @Route("/addmatierepublic/", name="addmatierepublic")
   */

  public function matierepublic()
  {
    return $this->render('users/addmatierepublic.html.twig');
  }

   /**
   * @Route("/addcours/", name="addcours")
   */

  public function cours()
  {
    return $this->render('users/addcours.html.twig');
  }

  
   /**
   * @Route("/addcourspublic/", name="addcourspublic")
   */

  public function courspublic()
  {
    return $this->render('users/addcourspublics.html.twig');
  }

   /**
   * @Route("/pagedescoursp/", name="pagedescoursp")
   */

  public function pagedescoursp()
  {
    return $this->render('users/pagedescourspublic.html.twig');
  }


}