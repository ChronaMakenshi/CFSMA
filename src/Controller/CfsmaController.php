<?php

namespace App\Controller;


use App\Entity\Cours;
use App\Entity\Classes;
use App\Entity\Filieres;
use App\Entity\Matieres;
use App\Entity\Sections;
use App\Entity\Compagnies;
use App\Entity\Matierepublics;
use App\Repository\SectionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CfsmaController extends AbstractController
{
     /**
     * @Route("/", name="matiere")
     */
    
    public function pagematiere(ManagerRegistry $mat)
    {
      $matieres= $mat->getRepository(Matieres::class)->findAll();

    return $this->render('users/pagedesmatiere.html.twig', [
    'controller_name' => 'CfsmaController',
    'matieres' => $matieres
    ]);
  }

    /**
    * @Route("/public/", name="public")
    */

    public function pagematierep(ManagerRegistry $matp)
    {
      $matierepublics= $matp->getRepository(Matierepublics::class)->findAll();

    return $this->render('users/pagedesmatierepublic.html.twig', [
    'matierepublics' => $matierepublics
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
                    'choice_label' => fn(Sections $sect) => $sect->getCompagnie()->getName() . '-' . $sect->getName(),
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

  public function deletefiliere(int $id, filieres $filiere, ManagerRegistry $fil,  EntityManagerInterface $manager): Response
  {
    $filiere = $fil->getRepository(filieres::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($filiere);
    $manager->flush();
    return $this->redirectToRoute('addfiliere',[
      'filieres' =>  $filiere,
    ]);
  }

   /**
   * @Route("/addcohorte/", name="addcohorte")
   * 
   */

  public function ajoutecohorte(Classes $cohorte = null,Request $request,ManagerRegistry $coh, EntityManagerInterface $manager): Response
  {
    $cohortes = $coh->getRepository(Classes::class)->findAll();
    $filieres = $coh->getRepository(filieres::class)->findAll();
    $sections = $coh->getRepository(Sections::class)->findAll();
    $compagnies = $coh->getRepository(Compagnies::class)->findAll();

    if(!$cohorte){
      $cohorte = new Classes;
    } 

    $form = $this->createFormBuilder($cohorte)
                  ->add('name', TextType::class, array('label' => false))
                  ->add('filiere', EntityType::class, [
                    'class' => Filieres::class,
                    'choice_label' => fn(Filieres $fil) => $fil->getSection()->getName() . '-' . $fil->getName(),
                    'choice_value' => 'id',
                    'label' => false,
                  ])
                  ->getForm(); 
               
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$cohorte->getId()){
        $cohorte;
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($cohorte);
      $manager->flush();

      return $this->redirectToRoute('addcohorte');
    }
    return $this->render('users/addcohorte.html.twig', [
    'filieres' =>  $filieres,
    'sections' =>  $sections,
    'compagnies' =>  $compagnies,
    'cohortes' => $cohortes,
    'formCohorte' =>$form->createView(),
    'EditMode' =>  $cohorte->getId() !== null
  ]);
}

/**
* @Route("/addcohorte/delete/{id}", name="addcohortedelete")
* @return Response
*/

public function deletecohorte(int $id, Classes $cohorte, ManagerRegistry $coh,  EntityManagerInterface $manager): Response
{
  $cohorte = $coh->getRepository(Classes::class)->find($id);
  $this->addFlash('success', 'Votre messsage est supprimé !');
  $manager->remove($cohorte);
  $manager->flush();
  return $this->redirectToRoute('addcohorte',[
    'cohortes' =>  $cohorte,
  ]);
}

   /**
   * @Route("/addmatiere/", name="addmatiere")
   * @Route("/addmatiere/{id}", name="addmatiereEdit")
   */

  public function ajoutematiere(Matieres $matiere = null,Request $request,ManagerRegistry $mat, EntityManagerInterface $manager): Response
  {
    $matieres= $mat->getRepository(Matieres::class)->findAll();

    if(!$matiere){
      $matiere = new Matieres;
    } 

    $form = $this->createFormBuilder($matiere)
                  ->add('name', TextType::class, array('label' => false)) 
                  ->getForm();
                 
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$matiere->getId()){
        $matiere;
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($matiere);
      $manager->flush();

      return $this->redirectToRoute('addmatiere');
    }
    return $this->render('users/addmatiere.html.twig', [
      'matieres' =>  $matieres,
      'formMatiere' =>$form->createView(),
      'EditMode' =>  $matiere->getId() !== null
    ]);
  }
  /**
  * @Route("/addmatiere/delete/{id}", name="addmatieredelete")
  * @return Response
  */

  public function deletematiere(int $id, Matieres $matiere, ManagerRegistry $mat,  EntityManagerInterface $manager): Response
  {
    $matiere = $mat->getRepository(Matieres::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($matiere);
    $manager->flush();
    return $this->redirectToRoute('addmatiere');
  }
  

   /**
   * @Route("/addmatierepublic/", name="addmatierepublic")
   * @Route("/addmatierepublic/{id}", name="addmatierepublicEdit")
   * @return Response
   */

  public function ajoutematierepublic(Matierepublics $matierepublic = null,Request $request, ManagerRegistry $matp, EntityManagerInterface $manager): Response
  {
    $matierepublics= $matp->getRepository(Matierepublics::class)->findAll();

    if(!$matierepublic){
      $matierepublic = new Matierepublics;
    } 

    $form = $this->createFormBuilder($matierepublic)
                  ->add('name', TextType::class, array('label' => false)) 
                  ->getForm();
                 
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$matierepublic->getId()){
        $matierepublic;
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($matierepublic);
      $manager->flush();

      return $this->redirectToRoute('addmatierepublic');
    }
    
    return $this->render('users/addmatierepublic.html.twig', [
      'matierepublics' =>  $matierepublics,
      'formMatierepublic' =>$form->createView(),
      'EditMode' =>  $matierepublic->getId() !== null
    ]);
  }

  /**
  * @Route("/addmatierepublic/delete/{id}", name="addmatierepublicdelete")
  * @return Response
  */

  public function deletematierepublic(int $id, Matierepublics $matierepublic, ManagerRegistry $matp,  EntityManagerInterface $manager): Response
  {
    $matierepublic = $matp->getRepository(Matierepublics::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($matierepublic);
    $manager->flush();
    return $this->redirectToRoute('addmatierepublic');
  }
  

   /**
   * @Route("/addcours/", name="addcours")
   * @Route("/addcours/{id}", name="addcoursEdit")
   */

  public function ajoutecours(Cours $cour = null,Request $request,ManagerRegistry $cou, EntityManagerInterface $manager, SluggerInterface $slugger): Response
  {
    $cours = $cou->getRepository(Cours::class)->findAll();
    $cohortes = $cou->getRepository(Classes::class)->findAll();
    $filieres = $cou->getRepository(filieres::class)->findAll();
    $matieres= $cou->getRepository(Matieres::class)->findAll();

    if(!$cour){
      $cour = new Cours;
    } 

    $form = $this->createFormBuilder($cour)
                  ->add('name', TextType::class, array('label' => false))
                  ->add('pdf', FileType::class, array('label' => false))
                  ->add('classe', EntityType::class, [
                    'class' => Classes::class,
                    'choice_label' => fn(Classes $coh) => $coh->getFiliere()->getName() . '-' . $coh->getName(),
                    'choice_value' => 'id',
                    'label' => false,
                  ])
                  ->add('matiere', EntityType::class, [
                    'class' => Matieres::class,
                    'choice_label' => 'name',
                    'choice_value' => 'id',
                    'label' => false,
                  ])
                  ->add('date', DateType::class, [
                    'placeholder' => [
                        'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                    ],
                    'label' => false,
                    'format' => 'dd MM yyyy',
                    'empty_data'  => '',
                  ])
                  ->add('visible', CheckboxType::class, [
                    'label' => 'Voule-vous mettre le cours en visible ?',
                    'value' => '1',
                    'row_attr' => ['class' => 'form-switch'],
                    'attr' => [ 'checked' => 'checked'],
                  ]) 
                  ->getForm();
                 
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      if(!$cour->getId()){
        $cour;
      }
      $brochureFile = $form->get('pdf')->getData();

      if ($brochureFile) {
          $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
          $safeFilename = $slugger->slug($originalFilename);
          $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

          try {
              $brochureFile->move(
                  $this->getParameter('brochures_directory'),
                  $newFilename
              );
          } catch (Cours $e) {
            
          }

          $cour->setPdf($newFilename);
      }
      $this->addFlash('success', 'Votre messsage est bien ajouté ou modifié');
      $manager->persist($cour);
      $manager->flush();

      return $this->redirectToRoute('addcours');
    }
    return $this->render('users/addcours.html.twig', [
      'cours' =>  $cours,
      'filieres' =>  $filieres,
      'matieres' =>  $matieres,
      'cohortes' => $cohortes,
      'formCours' => $form->createView(),
      'EditMode' =>  $cour->getId() !== null
    ]);
  }
  /**
  * @Route("/addcours/delete/{id}", name="addcoursdelete")
  * @return Response
  */

  public function deletecours(int $id, Cours $cour, ManagerRegistry $cou,  EntityManagerInterface $manager): Response
  {
    $cour = $cou->getRepository(Cours::class)->find($id);
    $this->addFlash('success', 'Votre messsage est supprimé !');
    $manager->remove($cour);
    $manager->flush();
    return $this->redirectToRoute('addcours');
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