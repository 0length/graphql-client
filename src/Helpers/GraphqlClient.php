<?php

namespace Zerolength\Graphql\Helpers;

class GraphqlClient
{

    protected $defaultHeaders = ['Content-Type: application/json', 'User-Agent: 0length-minimal-GraphQL-client/1.0'];
    protected $option;

    public function __construct(?GraphqlClientOptions $option)
    {
        $this->setOption($option);
    }

    /**
     * GraphqlClient::query is static method to make query http call.
     */
    public static function call(string $endpoint, string $query, array $variables = [], array $headers): array
    {

        if (false === $data = @file_get_contents($endpoint, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => $headers,
                'content' => json_encode(['query' => $query, 'variables' => $variables]),
            ]
        ]))) {
            $error = error_get_last();
            throw new \ErrorException($error['message'], $error['type']);
        }

        return json_decode($data, true);
    }

    /**
     * Instead __construct, to set $this->option value for specified key option for reuseable instance. But, without reconstruction.
     */
    public function setOption(GraphqlClientOptions $option)
    {
        $this->option = [
            "url" => $option->url,
            "query" =>  $option->query,
            "variables" =>  $option->variables,
            "headers" => array_merge($option->headers, $this->defaultHeaders)
        ];
        return $this->option;
    }

    /**
     * Instead __construct and $this->setOption, to set $this->option value for specified key option for reuseable instance WITH execution query.
     *
     */
    public function run(GraphqlClientOptions $option)
    {
        $this->setOption($option);
        try {
            return $this->call($this->option["url"], $this->option["query"], $this->option["variables"], $this->option["headers"]);
        } catch (\Throwable $th) {
            throw new \Exception($th);
        }
    }
}
