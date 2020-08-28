<?php


namespace App\GitHubViewer\Application;


use App\GitHubViewer\Application\RepositoryViewModel;
use App\GitHubViewer\Application\UserDetailsViewModel;
use Github\Client;

class ApplicationFacade
{
    private Client $client;

    public function __construct()
    {
        //używany tylko tutaj, dlatego nie wrzucam jako serwis na razie
        $this->client = new Client();
    }

    public function getRepositoryView(string $ownerLogin, string $repositoryName): RepositoryViewModel
    {
        $data = $this->client->api('repositories')->show($ownerLogin, $repositoryName);

        return new RepositoryViewModel(
            $data['full_name'],
            $data['description'],
            $data['git_url'],
            $data['stargazers_count'],
            \DateTime::createFromFormat(\DateTime::ATOM, $data['created_at'])
        );
    }

    public function getUserDetailsView(string $login): UserDetailsViewModel
    {
        $data = $this->client->api('users')->show($login);

        return new UserDetailsViewModel(
            $data['name'],
            $data['url'],
            $data['email'],
            \DateTime::createFromFormat(\DateTime::ATOM, $data['created_at'])
        );
    }

}