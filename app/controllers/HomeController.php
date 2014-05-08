<?php

class HomeController extends BaseController {

	/**
    * Génère la vue de l'accueil
    *
    * @param $parties
    * @return View
    */   
    private function generate_home($parties)
    {
        return View::make('home',  array(
            'parties' => $parties,
        ));
    }

    /**
    * Affiche la page d'accueil
    *
    * @return View
    */
    public function home()
    {
        $parties = Party::select('id', 'name', 'content')
					        ->orderBy('created_at', 'desc')
					        ->paginate(3);
        return $this->generate_home($parties);
    }

    /**
    * Affiche un article
    *
    * @param $party_id
    * @return View
    */
    public function party($party_id)
    {
    	$party = Party::find($party_id);
        $comments = $party->comments()->orderBy('comments.created_at', 'desc')
                                        ->join('users', 'users.id', '=', 'comments.user_id')
                                        ->select('users.username', 'title', 'text', 'comments.created_at')
                                        ->get();
        return View::make('party', array('party' => $party, 'comments' => $comments));
    }

    /**
    * Traitement du formulaire d'ajout de commentaires
    *
    * @return Redirect
    */
    public function comment()
    {
        Comment::create(
	        array(
	            'title' => strip_tags(Input::get('title')),
	            'user_id' => Auth::user()->id,
	            'party_id' => Input::get('id_party'),
	            'text' => strip_tags(Input::get('comment'))
	        )
	    );
	    return Redirect::to('party/'.Input::get('id_party'));
    }

}