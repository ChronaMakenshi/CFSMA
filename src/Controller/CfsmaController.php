<?php

namespace App\Controller;

use App\Entity\Filieres;
use App\Entity\Sections;
use App\Entity\Compagnies;
use App\Repository\SectionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($compagnie);
      $manager->flush();

      return $this->redirectToRoute('addcompagnie');
    }
    return $this->render('users/addcompagnie.html.twig', [
      'compagnies' =>  $compagnies,
      'formCompagnie' =>$form->createView(),
      'EditMode' =>  $compagnie->getId() !== null
    ]);
  }
  /**
  * @Route("/addcompagnie/delete/{id}", name="addcompagniedelete")
  * @return Response
  */

  public function deletecomp(int $id, Compagnies $compagnie, ManagerRegistry $comp,  EntityManagerInterface $manager): Response
  {
    $compagnie = $comp->getRepository(Compagnies::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($compagnie);
    $manager->flush();
    return $this->redirectToRoute('addcompagnie');
  }
         
   /**
   * @Route("/addsection/", name="addsection")
   * @Route("/addsection/{id}", name="addsectionEdit")
   * @return Response
   */

  public function ajoutesection(Sections $section = null,Request $request,ManagerRegistry $sect, EntityManagerInterface $manager): Response
  {  
    $sections = $sect->getRepository(Sections::class)->findAll();
    $compagnies = $sect->getRepository(Compagnies::class)->findAll();

    if(!$section){
      $section = new Sections;
    } 

    $form = $this->createFormBuilder($section)
                  ->add('name', TextType::class, array('label' => false))
                  ->add('compagnie', EntityType::class, [
                    'class' => Compagnies::class,
                    'choice_label' => 'name',
                    'choice_value' => 'id',
                    'label' => false,
                  ])
                  ->getForm(); 
               
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$section->getId()){
        $section;
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($section);
      $manager->flush();
      dump($section);
      return $this->redirectToRoute('addsection');
    }
    return $this->render('users/addsection.html.twig', [
      'sections' =>  $sections,
      'compagnies' =>  $compagnies,
      'formSection' =>$form->createView(),
      'EditMode' =>  $section->getId() !== null
    ]);
  }

  /**
  * @Route("/addsection/delete/{id}", name="addsectiondelete")
  * @return Response
  */

  public function deletesection(int $id, Sections $section, ManagerRegistry $sect,  EntityManagerInterface $manager): Response
  {
    $section = $sect->getRepository(Sections::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($section);
    $manager->flush();
    return $this->redirectToRoute('addsection');
  }

   /**
   * @Route("/addfiliere/", name="addfiliere")
   * @Route("/addfiliere/{id}", name="addfiliereEdit")
   * @return Response
   */

  public function ajoutefiliere(Filieres $filiere = null,Request $request,ManagerRegistry $fil, EntityManagerInterface $manager): Response
  {  
    $filieres = $fil->getRepository(filieres::class)->findAll();
    $sections = $fil->getRepository(Sections::class)->findAll();
    $compagnies = $fil->getRepository(Compagnies::class)->findAll();

    if(!$filiere){
      $filiere = new Filieres;
    } 

    $form = $this->createFormBuilder($filiere)
                  ->add('name', TextType::class, array('label' => false))
                  ->add('section', EntityType::class, [
                    'class' => Sections::class,
                    'choice_label' => fn(Sections $Comp) => $Comp->getCompagnie()->getName() . '-' . $Comp->getName(),
                    'choice_value' => 'id',
                    'query_builder' => fn(SectionsRepository $sectionRepo) =>  $sectionRepo->createQueryBuilder('s')->orderBy('s.name', 'ASC'),
                    'label' => false,
                  ])
                  ->getForm(); 
               
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$filiere->getId()){
        $filiere;
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($filiere);
      $manager->flush();
      dump($filiere);
      return $this->redirectToRoute('addfiliere');
    }
    return $this->render('users/addfiliere.html.twig', [
      'filieres' =>  $filieres,
      'sections' =>  $sections,
      'compagnies' =>  $compagnies,
      'formFiliere' =>$form->createView(),
      'EditMode' =>  $filiere->getId() !== null
    ]);
  }

    /**
  * @Route("/addfiliere/delete/{id}", name="addfilieredelete")
  * @return Response
  */

  public function deletefiliere(int $id, filieres $filiere, ManagerRegistry $sect,  EntityManagerInterface $manager): Response
  {
    $filiere = $sect->getRepository(filieres::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($filiere);
    $manager->flush();
    return $this->redirectToRoute('addfiliere',[
      'filieres' =>  $filiere,
    ]);
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