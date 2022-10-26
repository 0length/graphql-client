<?php

namespace Zerolength\Graphql\Entities;


class GraphqlQueriesOptions {
    /**
     * Property key name on result data
     */
    public string $name = "";
    /**
     * Variable to be use on query with operation name
     */
    public array $variables = [];
    /**
     * Query of Graphql
     */
    public string $query = "";
}
