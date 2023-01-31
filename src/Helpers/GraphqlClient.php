<?php

namespace Zerolength\Graphql\Helpers;

use Zerolength\Graphql\Entities\GraphqlQueriesOptions;

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
        $data = json_encode([]);
        if (false === $data = @file_get_contents($endpoint, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => $headers,
                'content' => json_encode(['query' => $query, 'variables' => $variables]),
            ]
        ]))) {
            $data = json_encode(['net_error'=>error_get_last()]);
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
            "headers" => array_merge($option->headers, $this->defaultHeaders)
        ];
        return $this->option;
    }

    /**
     * execution payload`.
     *
     */
    public function run(GraphqlQueriesOptions $option)
    {
        try {
            return $this->call($this->option["url"], $option->query, $option->variables, $this->option["headers"]);
        } catch (\Throwable $th) {
            throw new \Exception($th);
        }
    }
}
