<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Services\GoogleClient;
use App\Services\IonAuthGoogle;
use CodeIgniter\Controller;
use IonAuth\Libraries\IonAuth;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    protected $ionAuth;
    protected $google_client;
    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->google_client = new GoogleClient();
        $this->ionAuth = new IonAuthGoogle();
    }
    protected function withIon(array $data = [])
    {
        $data['ionAuth'] = $this->ionAuth;
        $data['authUrl'] = $this->google_client->getGoogleClient()->createAuthUrl();
        return $data;
    }
}