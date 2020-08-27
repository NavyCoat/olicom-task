<?php


namespace App\Presentation\Rest;


use App\Application\GitHubViewer\ApplicationFacade;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RestController
{

    private ApplicationFacade $githubViewer;

    /**
     * RestController constructor.
     * @param ApplicationFacade $githubViewer
     */
    public function __construct(ApplicationFacade $githubViewer)
    {
        $this->githubViewer = $githubViewer;
    }

    /**
     * @Route("/v1/repositories/{ownerLogin}/{repositoryName}", name="repo_view")
     */
    public function viewRepostioryAction(string $ownerLogin, string $repositoryName)
    {
        $view = $this->githubViewer->getRepositoryView($ownerLogin, $repositoryName);

        return new JsonResponse($view);
    }

    /**
     * @Route("/v1/users/{login}", name="user_view")
     */
    public function viewUserAction(string $login)
    {
        $view = $this->githubViewer->getUserDetailsView($login);

        return new JsonResponse($view);
    }


}