<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Churnsolution_Connection_Controller
{

    // Here initialize our namespace and resource name.
    /**
     * @var string
     */
    private $namespace;
    /**
     * @var string
     */
    private $resource_name;

    public function __construct()
    {
        $this->namespace = '/churnsolution/v1';
        $this->resource_name = 'connection';
    }

    // Register our routes.
    public function register_routes()
    {
        register_rest_route($this->namespace, '/' . $this->resource_name, array(
            array(
                'methods' => 'GET',
                'callback' => array($this, 'churnsolution_get_connection'),
            )
        ));

    }

    function churnsolution_get_connection(WP_REST_Request $args)
    {

        if (class_exists('Churnsolution_Connection')) {
            $connection = Churnsolution_Connection::get_connection();

            if (empty($connection)) {
                return new stdClass;
            }

            return array(
                'id' => (int)$connection->getId(),
                'api_key' => $connection->getApiKey(),
                'app_id' => $connection->getAppId(),
                'gateway' => $connection->getGateway()
            );

        }

        return new stdClass;
    }

}

// Function to register our new routes from the controller.
function churnsolution_register_connection_routes()
{
    $controller = new Churnsolution_Connection_Controller();
    $controller->register_routes();
}

add_action('rest_api_init', 'churnsolution_register_connection_routes');



