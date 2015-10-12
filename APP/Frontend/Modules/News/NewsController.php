<?php
namespace App\Frontend\Modules\News;
use \Model\NewsManagerPDO;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\FormHandler;

use \Entity\News;
use \Entity\Comment;

use \FormBuilder\CommentFormBuilder;
use \FormBuilder\NewsMemberFormBuilder;

class NewsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombreNews = $this->app->config()->get('nombre_news');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreNews.' dernières news');
 
    // On récupère le manager des news.
    /** @var NewsManagerPDO $manager */
    $manager = $this->managers->getManagerOf('News');
 
    $listeNews = $manager->getList(0, $nombreNews);
 
    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
 
        $news->setContenu($debut);
      }
    }
 
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeNews', $listeNews);
  }
 
  public function executeShow(HTTPRequest $request)
  {
    $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
 
    if (empty($news) ||$news ==null){
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('title', $news->titre());
    $this->page->addVar('news', $news);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
  }
 
  public function executeInsertComment(HTTPRequest $request)
  {
    // si la news dans laquelle on veut insérer n'existe pas, redirection
    $news = $this->managers->getManagerOf('News')->getUnique($request->getData('news'));
    if($news == null){
      $this->app->httpResponse()->redirect404();
    }


    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'news' => $request->getData('news'),
        'auteur' => $request->postData('auteur'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
 
      $this->app->httpResponse()->redirect('news-'.$request->getData('news').'.html');
    }
 
    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }

  public function executeInsert(HTTPRequest $request)
  {

      // vérifier que la personne est bien connecté

    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'une news');
  }

  public function executeUpdate(HTTPRequest $request)
  {
      $this->processForm($request);

      $this->page->addVar('title', 'Modification d\'une news');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $news = new News([ //$this->managers->getManagerOf('Members')->getUsername($_SESSION['id']), //récupérer le nom d'utilisateur si c'est pas un admin sinon laisser en postdata
          //$this->managers->getManagerOf('Members')->getUsername($this->app->user()->getAttribute("id")
          'auteur'=>$this->app->user()->getAttribute('user'),
          'titre' => $request->postData('titre'),
          'contenu' => $request->postData('contenu')
      ]);

      if ($request->getExists('id'))
      {
        $news->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la news est transmis si on veut la modifier
      if ($request->getExists('id') )
      {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
        if( $news ==null ){

          $this->app->httpResponse()->redirect404();
        }

      }
      else
      {
        $news = new News;
      }
    }

    $formBuilder = new NewsMemberFormBuilder($news);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('News'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');

      $this->app->httpResponse()->redirect('.');
    }

    $this->page->addVar('form', $form->createView());
  }

  public function executeDelete(HTTPRequest $request)
  {
      if($this->managers->getManagerOf('News')->get($request->getData('id'))===false
          || $this->managers->getManagerOf('News')->get($request->getData('id'))->auteur()!==$this->app->user()->getAttribute('user') )
      {
          $this->app->httpResponse()->redirect404();
      }

      $newsId = $request->getData('id');
      $this->managers->getManagerOf('News')->delete($newsId);
      $this->managers->getManagerOf('Comments')->deleteFromNews($newsId);

      $this->app->user()->setFlash('La news a bien été supprimée !');

      $this->app->httpResponse()->redirect('.');
  }
}