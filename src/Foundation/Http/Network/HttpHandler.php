<?php


namespace App\Foundation\Http\Network;


use Log;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class HttpHandler
{
    private const ERROR_LOG = 'api_error';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var string[]
     */
    private $headers = [
        'Accept'       => "application/json",
        'Content-Type' => "application/json"
    ];

    /**
     * @var string
     */
    private $base_url;

    /**
     * @var Client
     */
    private $API;

    /**
     * HttpHandler constructor.
     * @param string $base_url
     */
    public function __construct(string $base_url)
    {

        $this->request = new Request;
        $this->API = new Client();
        $this->base_url = $base_url;
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return \stdClass
     * @throws GuzzleException
     */
    public function get(string $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        return $this->sendRequest('get', $uri, $query, $body, $json, $headers);
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return \stdClass
     * @throws GuzzleException
     */
    public function post(string $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        return $this->sendRequest('post', $uri, $query, $body, $json, $headers);
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return \stdClass
     * @throws GuzzleException
     */
    public function patch(string $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        return $this->sendRequest('patch', $uri, $query, $body, $json, $headers);
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return \stdClass
     * @throws GuzzleException
     */
    public function put(string $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        return $this->sendRequest('put', $uri, $query, $body, $json, $headers);
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return mixed
     * @throws GuzzleException
     */
    public function delete(string $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        return $this->sendRequest('delete', $uri, $query, $body, $json, $headers);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param array $body
     * @param array $json
     * @param array $headers
     * @return \stdClass
     * @throws GuzzleException
     */
    private function sendRequest($method, $uri, array $query = [], array $body = [], array $json = [], array $headers = [])
    {
        $api_url = "{$this->base_url}/{$uri}";
        $headers = $this->addHeaders($headers);

        $request_data = [
            RequestOptions::HEADERS => $headers,
        ];

        if(!empty($query))
            $request_data[RequestOptions::QUERY] = $query;
        if(!empty($body))
            $request_data[RequestOptions::FORM_PARAMS] = $body;
        if(!empty($json))
            $request_data[RequestOptions::JSON] = $json;


        try {
            $response = $this->API->request($method, $api_url, $request_data);

            return $this->onSuccess($response);

        } catch(RequestException $e) {
            return $this->onError($e);
        }
    }

    /**
     * @param ResponseInterface $response
     * @return \stdClass
     */
    private function onSuccess(ResponseInterface $response)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        $status = $response->getStatusCode();
        return $this->response($data, $status);
    }

    /**
     * @param RequestException $e
     * @return \stdClass
     */
    private function onError(RequestException $e)
    {
        $status = $e->getCode();
        switch($status) {
            case 422:
            case 401:
                $data = json_decode($e->getResponse()->getBody()->getContents(), true);
                return $this->response($data, $status);
                break;
            default:
                $response = $e->getResponse()->getBody()->getContents();
                Log::error(self::ERROR_LOG . ":" . $response);
                return $this->response(['message' => $response], $status);
        }
    }

    protected function addHeaders(array $headers)
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this->headers;
    }

    /**
     * @param mixed $data
     * @param int $code
     * @return \stdClass
     */
    private function response($data, int $code)
    {
        $response = new \stdClass();

        $response->data = $data;
        $response->code = $code;

        return $response;
    }

}
