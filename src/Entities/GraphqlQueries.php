<?php

namespace Zerolength\Graphql\Entities;

use Zerolength\Graphql\Helpers\GraphqlClient;
use Zerolength\Graphql\Helpers\GraphqlClientOptions;
use Zerolength\Graphql\Helpers\GraphqlResponse;
use Illuminate\Support\Facades\Log;

class GraphqlQueries
{
    protected $client, $payload;

    public function __construct()
    {
        $options = new GraphqlClientOptions();
        $options->url = config("graphql.workspace");
        $options->headers = config("graphql.headers");
        $this->client = new GraphqlClient($options);
        $this->payload = new GraphqlQueriesOptions();

    }

    public function setPayload($name, $variables, $query)
    {
        $this->payload->name = $name;
        $this->payload->variables = $variables;
        $this->payload->query = $query;
        return $this->payload;
    }

    /**
     * To execute query and get data response by singel selector.
     */
    public function execute()
    {
        try {
            $response = new GraphqlResponse($this->client->run($this->payload));
            return $response->data[$this->payload->name];
        } catch (\Throwable $th) {
            Log::error(json_encode($th));
            throw $th;
            return null;
        }
    }
}
