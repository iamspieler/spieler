<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception_502 extends Kohana_HTTP_Exception_502 {

    public function get_response() {
        // Lets log the Exception, Just in case it's important!
        Kohana_Exception::log($this);

        if (Kohana::$environment >= Kohana::DEVELOPMENT) {
            // Show the normal Kohana error page.
            return parent::get_response();
        } else {

            $view = View::factory('Error/502');

            // Remembering that `$this` is an instance of HTTP_Exception_404
            $view->message = $this->getMessage();

            $response = Response::factory()
                    ->status(502)
                    ->body($view->render());

            return $response;
        }
    }

}