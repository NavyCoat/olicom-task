<?php
declare(strict_types=1);

namespace App\GitHubViewer\Presentation\Rest;


use App\GitHubViewer\Application\ApplicationFacade;
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
    public function viewRepostioryAction(string $ownerLogin, string $repositoryName): JsonResponse
    {
        $view = $this->githubViewer->getRepositoryView($ownerLogin, $repositoryName);

        return new JsonResponse($view);
    }

    /**
     * @Route("/v1/users/{login}", name="user_view")
     */
    public function viewUserAction(string $login): JsonResponse
    {
        $view = $this->githubViewer->getUserDetailsView($login);

        return new JsonResponse($view);
    }


}