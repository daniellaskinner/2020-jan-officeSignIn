<?php

namespace SignInApp\Controllers;

use SignInApp\Models\VisitorModel;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class GetAllSignedInVisitorsController
{
    private $visitorModel;

    /**
     * GetAllSignedInVisitorsController constructor.
     *
     * @param $visitorModel
     */
    public function __construct(VisitorModel $visitorModel)
    {
        $this->visitorModel = $visitorModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        //once tested, surround this with an if statement to check admin logged in status
        $apiResponse = [
            'Success' => false,
            'Message' => 'Unable to retrieve data',
            'Data' => []
        ];

        $apiResponse['Data'] = $this->visitorModel->getAllSignedInVisitors();
        return $response->withJson($apiResponse);
    }
}