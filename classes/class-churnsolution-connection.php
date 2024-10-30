<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Churnsolution_Connection
{

    protected $id;

    protected $gateway;

    protected $api_key;

    protected $app_id;

    public function __construct($connection_data)
    {

        if (empty($connection_data)) {
            return;
        }


        $this->set($connection_data);

    }

    public function set($property, $value = null)
    {
        if (is_array($property)) {
            foreach ($property as $key => $value) {
                $this->set($key, $value);
            }

            return;
        }

        if (isset($this->{$property})) {
            if (is_int($this->{$property})) {
                $value = (int)$value;
            } elseif (is_float($this->{$property})) {
                $value = (float)$value;
            }
        }

        $this->{$property} = $value;
    }

    public static function get_connection()
    {

        global $wpdb;

        $sql_query = "SELECT * FROM `$wpdb->churnsolution_connection`";

        $connection_row = $wpdb->get_row($sql_query, ARRAY_A, 0);

        if(empty($connection_row)){
            return null;
        }

        return new Churnsolution_Connection($connection_row);
    }

    public static function create_or_update($connection_data)
    {
        $connection = self::get_connection();

        global $wpdb;

        if (!empty($connection)) {
            return $wpdb->update(
                $wpdb->churnsolution_connection,
                array(
                    'app_id' => $connection_data['app_id'],
                    'api_key' => $connection_data['api_key'],
                    'gateway' => $connection_data['gateway']
                ),
                array(
                    'id' => $connection->id
                )
            );
        } else {
            return $wpdb->insert(
                $wpdb->churnsolution_connection,
                array(
                    'app_id' => $connection_data['app_id'],
                    'api_key' => $connection_data['api_key'],
                    'gateway' => $connection_data['gateway']
                ),
                array(
                    '%s',
                    '%s',
                    '%s'
                )
            );
        }

    }

    public static function delete()
    {
        global $wpdb;

        $sql = "DELETE FROM $wpdb->churnsolution_connection";

        $wpdb->query($sql);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->app_id;
    }



}
