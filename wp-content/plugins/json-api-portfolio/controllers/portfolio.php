<?php
/*
Controller name: Portfolio
Controller description: Portfolio data
*/

/**
 * Class JSON_API_Portfolio_Controller
 */
class JSON_API_Portfolio_Controller {

    /**
     * @return array
     */
    public function info(){
        return array(
            "version" => JSON_API_PORFOLIO_VERSION
        );
    }

    /**
     * @return array
     */
    public function get_portfolio()
    {
        $data = file_get_contents(dirname(__FILE__) . '/../data/portfolio.json');

        $pass = password_hash('mypass', PASSWORD_BCRYPT);

        $b = password_verify('mypass', $pass);

        return array(
            'items' => json_decode($data)
        );
    }

    /**
     * @return array
     */
    public function get_portfolio_item()
    {
        global $json_api;
        $id = $json_api->query->id;
        if (empty($id)) {
            return array(
                'item' => null
            );
        }
        $data = file_get_contents(dirname(__FILE__) . '/../data/portfolio.json');
        $aData = json_decode($data);
        $filtered = array_filter($aData, function($item) use ($id) {
            return $item->id == intval($id);
        });
        return array(
            'item' => array_values($filtered)[0]
        );
    }    
}