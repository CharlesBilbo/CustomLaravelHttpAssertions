<?php
namespace CharlesBilbo\CustomHttpAssertions;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests as MakesHttpRequestsBase;
use Illuminate\Testing\LoggedExceptionCollection;
use Tests\Foundation\TestResponse;

trait MakesHttpRequests {
    use MakesHttpRequestsBase{
        MakesHttpRequestsBase::get as baseGet;
        MakesHttpRequestsBase::put as basePut;
        MakesHttpRequestsBase::post as basePost;
        MakesHttpRequestsBase::patch as basePatch;
        MakesHttpRequestsBase::delete as baseDelete;
        MakesHttpRequestsBase::getJson as baseGetJson;
        MakesHttpRequestsBase::putJson as basePutJson;
        MakesHttpRequestsBase::postJson as basePostJson;
        MakesHttpRequestsBase::deleteJson as baseDeleteJson;
        MakesHttpRequestsBase::options as baseOptions;
        MakesHttpRequestsBase::optionsJson as baseOptionsJson;
        MakesHttpRequestsBase::json as baseJson;
        MakesHttpRequestsBase::call as baseCall;
    }


    /**
     * Visit the given URI with a GET request.
     *
     * @param  string  $uri
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function get($uri, array $headers = [])
    {
        return $this->baseGet($uri, $headers);
    }

    /**
     * Visit the given URI with a GET request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function getJson($uri, array $headers = [])
    {
        return $this->baseJson('GET', $uri, [], $headers);
    }

    /**
     * Visit the given URI with a POST request.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function post($uri, array $data = [], array $headers = [])
    {
        return $this->basePost($uri, $data, $headers);
    }

    /**
     * Visit the given URI with a POST request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function postJson($uri, array $data = [], array $headers = [])
    {
        return $this->baseJson('POST', $uri, $data, $headers);
    }

    /**
     * Visit the given URI with a PUT request.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function put($uri, array $data = [], array $headers = [])
    {
        return $this->basePut($uri, $data, $headers);
    }

    /**
     * Visit the given URI with a PUT request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function putJson($uri, array $data = [], array $headers = [])
    {
        return $this->baseJson('PUT', $uri, $data, $headers);
    }

    /**
     * Visit the given URI with a PATCH request.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function patch($uri, array $data = [], array $headers = [])
    {
        return $this->basePatch($uri, $data, $headers);
    }

    /**
     * Visit the given URI with a PATCH request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function patchJson($uri, array $data = [], array $headers = [])
    {
        return $this->baseJson('PATCH', $uri, $data, $headers);
    }

    /**
     * Visit the given URI with a DELETE request.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function delete($uri, array $data = [], array $headers = [])
    {
        return $this->baseDelete($uri, $data, $headers);
    }

    /**
     * Visit the given URI with a DELETE request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function deleteJson($uri, array $data = [], array $headers = [])
    {
        return $this->baseJson('DELETE', $uri, $data, $headers);
    }

    /**
     * Visit the given URI with an OPTIONS request.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function options($uri, array $data = [], array $headers = [])
    {
        return $this->baseOptions($url, $data, $headers);
    }

    /**
     * Visit the given URI with an OPTIONS request, expecting a JSON response.
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function optionsJson($uri, array $data = [], array $headers = [])
    {
        return $this->baseJson('OPTIONS', $uri, $data, $headers);
    }

    /**
     * Visit the given URI with a HEAD request.
     *
     * @param  string  $uri
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function head($uri, array $headers = [])
    {
        return $this->baseHead();
    }

    /**
     * Call the given URI with a JSON request.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function json($method, $uri, array $data = [], array $headers = [])
    {
        return $this->baseJson($method, $uri, $data = [], $headers = []);
    }

    /**
     * Call the given URI and return the Response.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $parameters
     * @param  array  $cookies
     * @param  array  $files
     * @param  array  $server
     * @param  string|null  $content
     * @return \Tests\Foundation\TestResponse| \Illuminate\Testing\TestResponse
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        return $this->baseCall($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null);
    }

    /**
     * Create the test response instance from the given response.
     *
     * @param  \Illuminate\Http\Response  $response
     * @return \Tests\Foundation\TestResponse|\Illuminate\Testing\TestResponse
     */
    protected function createTestResponse($response)
    {
        return tap(TestResponse::fromBaseResponse($response), function ($response) {
            $response->withExceptions(
                $this->app->bound(LoggedExceptionCollection::class)
                    ? $this->app->make(LoggedExceptionCollection::class)
                    : new LoggedExceptionCollection
            );
        });
    }
}
