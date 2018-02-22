<?php
    namespace MadnessCODE\Copyscape;

    use MadnessCODE\Copyscape\Exceptions;

    class Response
    {
        protected $response;

        /**
         * Response constructor.
         *
         * @param $response
         *
         * @throws Exceptions\Response
         */
        public function __construct($response)
        {
            if($response->getStatusCode() != 200)
                throw new Exceptions\Response();

            $xml = simplexml_load_string($response->getBody());
            $json = json_encode($xml);
            $this->response = json_decode($json,TRUE);

            if(isset($this->response['error']))
                throw new Exceptions\Response($this->response['error']);
        }

        /**
         * Convert response to array
         *
         * @return mixed
         */
        public function toArray() {
            return $this->response;
        }
    }