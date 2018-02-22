<?php

    namespace MadnessCODE\Copyscape;

    class Api
    {
        private $endpoint = 'https://www.copyscape.com/api/';
        private $username, $api_key, $client;
        private $test = false;

        /**
         * Api constructor.
         *
         * @param $username
         * @param $api_key
         */
        public function __construct($username, $api_key)
        {
            $this->username = $username;
            $this->api_key = $api_key;

            $this->client = new \GuzzleHttp\Client(['base_url' => $this->endpoint]);
        }

        /**
         * Enable test mode
         */
        public function setTestMode() {
            $this->test = true;
        }

        /**
         * Check how much credit you have
         *
         * @return mixed
         */
        public function getBalance() {
            $res = $this->client->get('', ['query' => [
                'u' => $this->username,
                'k' => $this->api_key,
                'o' => 'balance',
                'x' => $this->test
            ]]);

            return (new Response($res))->toArray();
        }

        /**
         * Check for copies of a web page
         *
         * @param        $url
         * @param string $operation
         * @param int    $comparisons
         * @param string $ignore_sites
         *
         * @return mixed
         */
        public function urlSearch($url, $operation = "csearch", $comparisons = 0, $ignore_sites = "") {
            $res = $this->client->get('', ['query' => [
                'u' => $this->username,
                'k' => $this->api_key,
                'o' => $operation,
                'q' => $url,
                'c' => $comparisons,
                'i' => $ignore_sites,
                'x' => $this->test
            ]]);

            return (new Response($res))->toArray();
        }

        /**
         *  Check for copies of some text
         *
         * @param string $text_to_be_searched
         * @param string $encoding
         * @param string $operation
         * @param int    $comparisons
         * @param string $ignore_sites
         *
         * @return mixed
         */
        public function textSearch($text_to_be_searched, $encoding= 'ISO-8859-1', $operation = "csearch", $comparisons = 0, $ignore_sites = "") {
            $res = $this->client->post('', ['body' => [
                'u' => $this->username,
                'k' => $this->api_key,
                'o' => $operation,
                'e' => $encoding,
                't' => $text_to_be_searched,
                'c' => $comparisons,
                'i' => $ignore_sites,
                'x' => $this->test
            ]]);

            return (new Response($res))->toArray();
        }
    }